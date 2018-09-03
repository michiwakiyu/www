# ==============================================================================
# クラス名 : Model/GetRanking
# 作成日   : 2009/04/06
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : クライアントとの通信　ランキング表の取得
# 
# ------------------------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================
class GetRanking < Communication
	
	def response()
		# XMLヘッダとステータスの作成
		doc = REXML::Document.new 
		doc << REXML::XMLDecl.new('1.0', 'UTF-8') 
		responseGetRanking = doc.add_element("ResponseGetRanking") 
		status = responseGetRanking.add_element("Status").add_text("OK")
		
		responseGetRanking = GetRankingList(responseGetRanking)
		
		return doc
	end

	def	GetRankingList(responseGetRanking=nil)
		# DBアクセス
		rankingNum = @configXML.elements['/Config/RankingNum'].text # 問題数
		
		
		sqlQuery = ""
		sqlQuery = sqlQuery + "SELECT COUNT(E1.GET_SCORE) RANK, "
		sqlQuery = sqlQuery + "       E0.PLAYER_NAME, "
		sqlQuery = sqlQuery + "       E0.CORRECT_NUM, "
		sqlQuery = sqlQuery + "       E0.AVG_ANSWER_TIME, "
		sqlQuery = sqlQuery + "       E0.REGIST_TIME, "
		sqlQuery = sqlQuery + "       MIN(E0.GET_SCORE ) AS GET_SCORE "
		sqlQuery = sqlQuery + "  FROM EXTR_RANKING AS E0, EXTR_RANKING AS E1 "
		sqlQuery = sqlQuery + " WHERE E1.GET_SCORE >= E0.GET_SCORE "
		sqlQuery = sqlQuery + " GROUP BY E0.PLAYER_NAME, E0.CORRECT_NUM, E0.AVG_ANSWER_TIME, E0.REGIST_TIME "
		sqlQuery = sqlQuery + " ORDER BY GET_SCORE DESC, REGIST_TIME, PLAYER_NAME LIMIT " + rankingNum + " "
		
		dbRes = dbConnect.query( sqlQuery ) 

		# XMLの明細を作成
		rankingRecordList = responseGetRanking.add_element("RankingRecordList")
		
		dbRes.each{ |rank, playerName, correctNum, avgAnswerTime, registTime, getScore |
			rankingRecord = rankingRecordList.add_element("RankingRecord")
			rankingRecord.add_element("Rank").add_text( rank.to_s )
			rankingRecord.add_element("PlayerName").add_text(playerName.to_s)
			rankingRecord.add_element("Score").add_text(getScore.to_s)
			rankingRecord.add_element("AverageAnswerSecond").add_text(avgAnswerTime.to_s)
			rankingRecord.add_element("CorrectAnswerTimes").add_text(correctNum.to_s)
		}
		
		return responseGetRanking
	end
	
end
