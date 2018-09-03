# ==============================================================================
# クラス名 : Ranking
# 作成日   : 2009/03/21
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : 
# ランキングクラス。
# ------------------------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================
class Ranking

	SaveRecordNum = 0

	def initialize(dbConnect, configXML )
		@dbConnect = dbConnect
		@configXML = configXML
	end
	
	
	def update( playerName, avgAnswerTime, collectNum, totalScore )
	
		# プレイヤーが登録されているかを検索する。SQLインジェクション注意
		
		# プレイヤー名のサニタイジングする。
		playerName = Mysql::quote(playerName)
		
		selectQuery = ""
		selectQuery = selectQuery + "SELECT GET_SCORE  "
		selectQuery = selectQuery + "  FROM EXTR_RANKING "
		selectQuery = selectQuery + " WHERE PLAYER_NAME = '#{playerName}'"
		
		dbRes = @dbConnect.query( selectQuery )
		
		resultRank = 0
		if dbRes.num_rows > 0
		# 既登録
			currentScore = dbRes.fetch_hash().fetch("GET_SCORE").to_f
			
			if currentScore < totalScore
			# ランキングしているスコアを更新したので、既登録のスコアをアップデートする。
				updateExecution( playerName, avgAnswerTime, collectNum, totalScore )
				#print selectCurrentRankExecution( playerName ).to_s
				resultRank = selectCurrentRankExecution( playerName ).to_i
			end
		else
		# 未登録
			
			# 新規データをインサートする。
			insertExecution( playerName, avgAnswerTime, collectNum, totalScore )
			
			selectQuery = "SELECT COUNT(*) RANKING_COUNT FROM EXTR_RANKING "
			dbRes = @dbConnect.query( selectQuery )
			rankingNum = dbRes.fetch_hash().fetch("RANKING_COUNT").to_i
			
			maxRankingNum = @configXML.elements['/Config/RankingNum'].text.to_i # 問題数
			
			if ( maxRankingNum + SaveRecordNum ) < rankingNum
			# ランキング数が上限を超えているので、最低ランクの物を削除する。
				# 最低ランクのレコードのレコードNoを取得する。
				recordLogNo = lowestRankSelectExecution()
				# レコードNoを使用してレコードを削除する。
				deleteExecution( recordLogNo )
			end
			
			#print selectCurrentRankExecution( playerName ).to_s
			resultRank = selectCurrentRankExecution( playerName ).to_i
		end
		

		return resultRank
	end
	
	def selectCurrentRankExecution( playerName )
		#print "selectRanking"
		selectQuery = ""
		selectQuery = selectQuery + "SELECT   COUNT( RANKING_2.GET_SCORE ) RANK, "
		selectQuery = selectQuery + "         RANKING_1.RESULT_LOG_NO, "
		selectQuery = selectQuery + "         RANKING_1.PLAYER_NAME, "
		selectQuery = selectQuery + "         RANKING_1.REGIST_TIME, "
		selectQuery = selectQuery + "         RANKING_1.AVG_ANSWER_TIME, "
		selectQuery = selectQuery + "         RANKING_1.CORRECT_NUM, "
		selectQuery = selectQuery + "         MIN( RANKING_1.GET_SCORE ) GET_SCORE "
		selectQuery = selectQuery + "  FROM   EXTR_RANKING RANKING_1, "
		selectQuery = selectQuery + "         EXTR_RANKING RANKING_2 "
		selectQuery = selectQuery + " WHERE   RANKING_1.GET_SCORE <= RANKING_2.GET_SCORE "
		selectQuery = selectQuery + "GROUP BY RANKING_1.RESULT_LOG_NO, "
		selectQuery = selectQuery + "         RANKING_1.PLAYER_NAME, "
		selectQuery = selectQuery + "         RANKING_1.REGIST_TIME, "
		selectQuery = selectQuery + "         RANKING_1.AVG_ANSWER_TIME, "
		selectQuery = selectQuery + "         RANKING_1.CORRECT_NUM "
		selectQuery = selectQuery + "HAVING   PLAYER_NAME          = '#{playerName}' "
		selectQuery = selectQuery + "ORDER BY RANK DESC, RANKING_1.REGIST_TIME "
		dbRes = @dbConnect.query( selectQuery )
		
		if dbRes.num_rows > 0
			return dbRes.fetch_hash().fetch("RANK")
		else
			return 0
		end
	end
	
	def selectBestScoreExecution( playerName )
		selectQuery = ""
		selectQuery = selectQuery + "SELECT   COUNT( RANKING_2.GET_SCORE ) RANK, "
		selectQuery = selectQuery + "         RANKING_1.RESULT_LOG_NO, "
		selectQuery = selectQuery + "         RANKING_1.PLAYER_NAME, "
		selectQuery = selectQuery + "         RANKING_1.REGIST_TIME, "
		selectQuery = selectQuery + "         RANKING_1.AVG_ANSWER_TIME, "
		selectQuery = selectQuery + "         RANKING_1.CORRECT_NUM, "
		selectQuery = selectQuery + "         MIN( RANKING_1.GET_SCORE ) GET_SCORE "
		selectQuery = selectQuery + "  FROM   EXTR_RANKING RANKING_1, "
		selectQuery = selectQuery + "         EXTR_RANKING RANKING_2 "
		selectQuery = selectQuery + " WHERE   RANKING_1.GET_SCORE <= RANKING_2.GET_SCORE "
		selectQuery = selectQuery + "GROUP BY RANKING_1.RESULT_LOG_NO, "
		selectQuery = selectQuery + "         RANKING_1.PLAYER_NAME, "
		selectQuery = selectQuery + "         RANKING_1.REGIST_TIME, "
		selectQuery = selectQuery + "         RANKING_1.AVG_ANSWER_TIME, "
		selectQuery = selectQuery + "         RANKING_1.CORRECT_NUM "
		selectQuery = selectQuery + "HAVING   PLAYER_NAME          = '#{playerName}' "
		selectQuery = selectQuery + "ORDER BY RANK DESC, RANKING_1.REGIST_TIME "
		dbRes = @dbConnect.query( selectQuery )
		
		if dbRes.num_rows > 0
			return dbRes.fetch_hash().fetch("GET_SCORE")
		else
			return 0
		end
	end

	def insertExecution( playerName, avgAnswerTime, collectNum, totalScore )
		#print "rankingInsert"
		insertQuery = ""
		insertQuery = insertQuery + "INSERT INTO EXTR_RANKING ("
		insertQuery = insertQuery + "    PLAYER_NAME, "
		insertQuery = insertQuery + "    REGIST_TIME, "
		insertQuery = insertQuery + "    AVG_ANSWER_TIME , "
		insertQuery = insertQuery + "    CORRECT_NUM , "
		insertQuery = insertQuery + "    GET_SCORE   "
		insertQuery = insertQuery + " ) "
		insertQuery = insertQuery + "VALUES ( "
		insertQuery = insertQuery + "    '#{playerName}', "
		insertQuery = insertQuery + "    NOW() , "
		insertQuery = insertQuery + "    '#{avgAnswerTime}', "
		insertQuery = insertQuery + "    '#{collectNum}', "
		insertQuery = insertQuery + "    '#{totalScore}' "
		insertQuery = insertQuery + " ) "
		
		dbRes = @dbConnect.query( insertQuery )
		
	end
	
	def updateExecution( playerName, avgAnswerTime, collectNum, totalScore )
		#print "rankingUpdate"
		
		updateQuery = ""
		updateQuery = updateQuery + "UPDATE EXTR_RANKING "
		updateQuery = updateQuery + "   SET REGIST_TIME     = NOW() ,"
		updateQuery = updateQuery + "       AVG_ANSWER_TIME = '#{avgAnswerTime}' ,"
		updateQuery = updateQuery + "       CORRECT_NUM     = '#{collectNum}'    ,"
		updateQuery = updateQuery + "       GET_SCORE       = '#{totalScore}'     "
		updateQuery = updateQuery + " WHERE PLAYER_NAME     = '#{playerName}'     "
		
		dbRes = @dbConnect.query( updateQuery )
	end

	def lowestRankSelectExecution()
		#print "lowestRankSelect"
		selectQuery = ""
		selectQuery = selectQuery + "SELECT   COUNT( RANKING_2.GET_SCORE ) RANK, "
		selectQuery = selectQuery + "         RANKING_1.RESULT_LOG_NO, "
		selectQuery = selectQuery + "         RANKING_1.PLAYER_NAME, "
		selectQuery = selectQuery + "         RANKING_1.REGIST_TIME, "
		selectQuery = selectQuery + "         RANKING_1.AVG_ANSWER_TIME, "
		selectQuery = selectQuery + "         RANKING_1.CORRECT_NUM, "
		selectQuery = selectQuery + "         MIN( RANKING_1.GET_SCORE ) GET_SCORE "
		selectQuery = selectQuery + "  FROM   EXTR_RANKING RANKING_1, "
		selectQuery = selectQuery + "         EXTR_RANKING RANKING_2 "
		selectQuery = selectQuery + " WHERE   RANKING_1.GET_SCORE <= RANKING_2.GET_SCORE "
		selectQuery = selectQuery + "GROUP BY RANKING_1.RESULT_LOG_NO, "
		selectQuery = selectQuery + "         RANKING_1.PLAYER_NAME, "
		selectQuery = selectQuery + "         RANKING_1.REGIST_TIME, "
		selectQuery = selectQuery + "         RANKING_1.AVG_ANSWER_TIME, "
		selectQuery = selectQuery + "         RANKING_1.CORRECT_NUM "
		selectQuery = selectQuery + "ORDER BY RANK DESC, RANKING_1.REGIST_TIME DESC "
		selectQuery = selectQuery + "LIMIT 1 "
	
		dbRes = @dbConnect.query( selectQuery )
		
		return dbRes.fetch_hash().fetch("RESULT_LOG_NO").to_i
	end
	
	def deleteExecution( recordLogNo )
		#print "delete"
		deleteQuery = "DELETE FROM EXTR_RANKING WHERE RESULT_LOG_NO = #{recordLogNo} "
		@dbConnect.query( deleteQuery )
	end
end