# ==============================================================================
# クラス名 : InCorrectPattern
# 作成日   : 2009/03/17
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : 
# 誤答パターンの記録。
# ------------------------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================
class InCorrectPattern

	def initialize(dbConnect)
		@dbConnect = dbConnect
	end

	def update(answer)
		# 登録済みデータを抽出
		selectQuery = ""
		selectQuery = selectQuery + "SELECT * FROM EXTR_INCORRECT_PATTERN "
		selectQuery = selectQuery + " WHERE EXPRESSION_ID           = '#{answer.correctExpressionID}' "
		selectQuery = selectQuery + "   AND INCORRECT_EXPRESSION_ID = '#{answer.selectExpressionID}'  "

		dbRes = @dbConnect.query( selectQuery )
		
		#テスト
		#print dbRes.num_rows.to_s
		
		if dbRes.num_rows > 0
		 #登録済みデータが存在するならば、当該データを更新する
			updateExecution( dbRes, answer )
		else
		 #登録済みデータが存在しなければ、新規データを挿入する
			insertExecution( answer )
		end
		
	end
	
	def insertExecution( answer )
		
		insertQuery = ""
		insertQuery = insertQuery + "INSERT INTO EXTR_INCORRECT_PATTERN "
		insertQuery = insertQuery + "VALUES ( "
		insertQuery = insertQuery + " '#{answer.correctExpressionID}', " 	# EXPRESSION_ID
		insertQuery = insertQuery + " '#{answer.selectExpressionID}',  " 	# INCORRECT_EXPRESSION_ID
		insertQuery = insertQuery + " 'NULL', " 							# DELETE_FLAG
		insertQuery = insertQuery + "  1 , " 								# INCORRECT_PATTERN_NUM
		insertQuery = insertQuery + "  #{answer.answerSecond} " 			# AVG_INCORRECT_PATTERN_TIME
		insertQuery = insertQuery + " ) "
		
		@dbConnect.query( insertQuery )
	end

	def updateExecution( dbRes, answer )
		# 抽出の結果の一行をハッシュで受け取る
		hash = dbRes.fetch_hash
		
		# 平均秒数を再計算する
		# 新平均秒数 = (旧平均秒数 × 旧誤答回数 + 今回の誤答秒数) ÷ (旧誤答回数 + 1 )
		#               誤答総秒数 ÷ 誤誤答回数
		totalTime  = hash["AVG_INCORRECT_PATTERN_TIME"].to_f * hash["INCORRECT_PATTERN_NUM"].to_f + answer.answerSecond
		newAvgTime = ( totalTime / ( hash["INCORRECT_PATTERN_NUM"].to_i + 1 ) ).round_n(-2)

		# 更新SQL作成
		updateQuery = ""
		updateQuery = updateQuery + "UPDATE EXTR_INCORRECT_PATTERN "
		updateQuery = updateQuery + "SET INCORRECT_PATTERN_NUM      = INCORRECT_PATTERN_NUM + 1, "
		updateQuery = updateQuery + "    AVG_INCORRECT_PATTERN_TIME = '#{newAvgTime.to_s}'"
		updateQuery = updateQuery + " WHERE EXPRESSION_ID           = '#{answer.correctExpressionID}' "
		updateQuery = updateQuery + "   AND INCORRECT_EXPRESSION_ID = '#{answer.selectExpressionID}'  "

		@dbConnect.query( updateQuery )

	end
	
end
