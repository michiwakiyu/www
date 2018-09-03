# ==============================================================================
# クラス名 : Model/GetQuestion
# 作成日   : 2009/03/12
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : クライアントとの通信　問題と選択肢を取得
# 
# ------------------------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================
class GetQuestion < Communication
	
	def response()
		# XMLヘッダとステータスの作成
		doc = REXML::Document.new 
		doc << REXML::XMLDecl.new('1.0', 'UTF-8') 
		responseGetQuestion = doc.add_element("ResponseGetQuestion") 
		status = responseGetQuestion.add_element("Status").add_text("OK")
		
		responseGetQuestion = getQuestionList(responseGetQuestion)
		
		return doc
	end

	def	getQuestionList(responseGetQuestion=nil)
		# DBアクセス
		questionNum = @configXML.elements['/Config/QuestionNum'].text # 問題数
		
		# 問題数だけ、表情をランダムに取得
		sqlQuery = ""
		sqlQuery = sqlQuery + "SELECT EXPRESSION_ID, EXPRESSION_GROUP_ID, EXPRESSION_NAME "
		sqlQuery = sqlQuery + "  FROM EXTR_EXPRESSION "
		sqlQuery = sqlQuery + " WHERE DELETE_FLAG IS NULL "
		sqlQuery = sqlQuery + " ORDER BY RAND( ) LIMIT " + questionNum + " "
		
		dbRes = dbConnect.query( sqlQuery ) 

		# XMLの明細を作成
		questionList = responseGetQuestion.add_element("questionList")
		
		i=1
		dbRes.each{ |expressionID, expressionGroupID, expressionName |
			question = questionList.add_element("Question")
			question.add_element("QuestionNo").add_text( i.to_s )
			question.add_element("ExpressionID").add_text(expressionID.to_s)
			question.add_element("ExpressionName").add_text(expressionName.to_s)
			question.add_element("ExpressionGroupID").add_text(expressionGroupID.to_s)
			
			question = getChoiceList(question, expressionID, expressionGroupID)
			
			i = i + 1
		}
		
		return responseGetQuestion
	end

	def	getChoiceList(question=nil, expressionID=nil, expressionGroupID=nil)

		correctChoiceNum = @configXML.elements['/Config/ChoiceNum/CorrectChoiceNum'].text # 不正解選択肢数
		incorrectChoiceNum = @configXML.elements['/Config/ChoiceNum/IncorrectChoiceNum'].text # 不正解選択肢数
		sameGroupChoiceNum = @configXML.elements['/Config/ChoiceNum/SameGroupChoiceNum'].text # ひっかけ選択肢数

		sqlQuery = ""
		#正解選択肢 問い合わせ作成
		sqlQuery = sqlQuery + " SELECT EXPRESSION_ID, EXPRESSION_GROUP_ID, EXPRESSION_NAME "
		sqlQuery = sqlQuery + "   FROM EXTR_EXPRESSION "
		sqlQuery = sqlQuery + "  WHERE DELETE_FLAG IS NULL "
		sqlQuery = sqlQuery + "    AND EXPRESSION_ID = '" + expressionID + "' "
		sqlQuery = sqlQuery + "    LIMIT " + correctChoiceNum + " "
		sqlQuery = sqlQuery + " UNION ALL "
		#不正解選択肢 問い合わせ作成
		sqlQuery = sqlQuery + " SELECT EXPRESSION_ID, EXPRESSION_GROUP_ID, EXPRESSION_NAME "
		sqlQuery = sqlQuery + "   FROM EXTR_EXPRESSION "
		sqlQuery = sqlQuery + "  WHERE DELETE_FLAG IS NULL "
		sqlQuery = sqlQuery + "    AND EXPRESSION_ID <> '" + expressionID + "' "
		sqlQuery = sqlQuery + "    AND EXPRESSION_GROUP_ID <> '" + expressionGroupID + "' "
		sqlQuery = sqlQuery + "    LIMIT " + incorrectChoiceNum + " "
		sqlQuery = sqlQuery + " UNION ALL "
		#ひっかけ選択肢
		sqlQuery = sqlQuery + " SELECT EXPRESSION_ID, EXPRESSION_GROUP_ID, EXPRESSION_NAME "
		sqlQuery = sqlQuery + "   FROM EXTR_EXPRESSION "
		sqlQuery = sqlQuery + "  WHERE DELETE_FLAG IS NULL "
		sqlQuery = sqlQuery + "    AND EXPRESSION_ID <> '" + expressionID + "' "
		sqlQuery = sqlQuery + "    AND EXPRESSION_GROUP_ID = '" + expressionGroupID + "' "
		sqlQuery = sqlQuery + "    LIMIT " + sameGroupChoiceNum + " "
		sqlQuery = sqlQuery + " UNION ALL "
		#文法エラー回避のためのダミー
		sqlQuery = sqlQuery + " SELECT EXPRESSION_ID, EXPRESSION_GROUP_ID, EXPRESSION_NAME "
		sqlQuery = sqlQuery + "   FROM EXTR_EXPRESSION "
		sqlQuery = sqlQuery + "  WHERE EXPRESSION_ID IS NULL "
		sqlQuery = sqlQuery + " ORDER BY RAND( ) "
		
		
		dbRes = dbConnect.query( sqlQuery ) 

		# XMLの明細を作成
		choiceList = question.add_element("ChoiceList")
		
		questionExpressionID 		= expressionID
		questionExpressionGroupID 	= expressionGroupID

		i=1
		dbRes.each{ |expressionID, expressionGroupID, expressionName |
			choice = choiceList.add_element("Choice")
			choice.add_element("ChoiceNo").add_text( i.to_s )
			choice.add_element("ExpressionID").add_text(expressionID.to_s)
			choice.add_element("ExpressionName").add_text(expressionName.to_s)
			choice.add_element("ExpressionGroupID").add_text(expressionGroupID.to_s)

			if questionExpressionID == expressionID
			#正解の選択肢
				choice.add_element("ChoiceType").add_text( "○" )
			elsif
				if questionExpressionGroupID == expressionGroupID
				#惜しい選択肢
					choice.add_element("ChoiceType").add_text( "△" )
				else
				#不正解の選択肢
					choice.add_element("ChoiceType").add_text( "×" )
				end
			end

			i = i + 1
		}
		
		return question
	end
	
end
