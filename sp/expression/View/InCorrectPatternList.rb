# ==============================================================================
# クラス名 : View/InCorrectPatternList
# 作成日   : 2009/06/20
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : ビュー　誤答パターンリスト一覧
# 
# ------------------------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================
class InCorrectPatternList < View

	def show
		
		dbRes = dbConnect.query( selectQuery )

		htmlHeader("誤答パターン一覧")

		puts "<body>"
		puts "<table border='2'>"

		tableHeader

		rowCount = 0
		dbRes.each{ | 	incPt_expressionId, 			corEx_expressionName, corGr_expressionGroupId, corGr_expressionGroupName, 
						incPt_incorrectExpressionId, 	incEx_expressionName, incGr_expressionGroupId, incGr_expressionGroupName,
						incPt_incorrectPatternNum, incPt_avgIncorrectPatternTime |

			if corGr_expressionGroupId == incGr_expressionGroupId
				incType = "△"
			else
				incType = "×"
			end

			puts "	<tr align='right'>"
			puts "		<td>#{incType.to_s}</td>"
			puts "		<td>#{incPt_expressionId.to_s}</td>"
			puts "		<td>#{corEx_expressionName.to_s}</td>"
			puts "		<td>#{corGr_expressionGroupId.to_s}</td>"
			puts "		<td>#{corGr_expressionGroupName.to_s}</td>"
			puts "		<td>#{incPt_incorrectExpressionId.to_s}</td>"
			puts "		<td>#{incEx_expressionName.to_s}</td>"
			puts "		<td>#{incGr_expressionGroupId.to_s}</td>"
			puts "		<td>#{incGr_expressionGroupName.to_s}</td>"
			puts "		<td>#{incPt_incorrectPatternNum.to_s}</td>"
			puts "		<td>#{incPt_avgIncorrectPatternTime.to_s}</td>"
			puts "	</tr>"

			rowCount = rowCount + 1

			if rowCount >= 10
				tableHeader
				rowCount = 0
			end
		}
		puts "</table>"

		htmlFooter

	end

	# 以下、プライベートメソッド
	def tableHeader
		puts "	<tr>"
		puts "		<td colspan='1'></td>"
		puts "		<td colspan='4'>正解の表情</td>"
		puts "		<td colspan='4'>選択した表情</td>"
		puts "		<td colspan='1'>合計<br>誤答回数</td>"
		puts "		<td colspan='1'>平均<br>解答時間</td>"
		puts "	</tr>"
	end
	private :tableHeader

	def selectQuery
		selectQuery = ""
		selectQuery = selectQuery + "SELECT INC_PT.EXPRESSION_ID, "
		selectQuery = selectQuery + "       COR_EX.EXPRESSION_NAME, "
		selectQuery = selectQuery + "       COR_GR.EXPRESSION_GROUP_ID, "
		selectQuery = selectQuery + "       COR_GR.EXPRESSION_GROUP_NAME, "
		selectQuery = selectQuery + "       INC_PT.INCORRECT_EXPRESSION_ID, "
		selectQuery = selectQuery + "       INC_EX.EXPRESSION_NAME, "
		selectQuery = selectQuery + "       INC_GR.EXPRESSION_GROUP_ID, "
		selectQuery = selectQuery + "       INC_GR.EXPRESSION_GROUP_NAME, "
		selectQuery = selectQuery + "       INC_PT.INCORRECT_PATTERN_NUM, "
		selectQuery = selectQuery + "       INC_PT.AVG_INCORRECT_PATTERN_TIME "
		selectQuery = selectQuery + "  FROM EXTR_INCORRECT_PATTERN  INC_PT, "
		selectQuery = selectQuery + "       EXTR_EXPRESSION_GROUP   COR_GR, "
		selectQuery = selectQuery + "       EXTR_EXPRESSION         COR_EX, "
		selectQuery = selectQuery + "       EXTR_EXPRESSION_GROUP   INC_GR, "
		selectQuery = selectQuery + "       EXTR_EXPRESSION         INC_EX  "
		selectQuery = selectQuery + " WHERE INC_PT.DELETE_FLAG IS NULL "
		selectQuery = selectQuery + "   AND INC_PT.EXPRESSION_ID           = COR_EX.EXPRESSION_ID "
		selectQuery = selectQuery + "   AND INC_PT.INCORRECT_EXPRESSION_ID = INC_EX.EXPRESSION_ID "
		selectQuery = selectQuery + "   AND COR_EX.EXPRESSION_GROUP_ID     = COR_GR.EXPRESSION_GROUP_ID "
		selectQuery = selectQuery + "   AND INC_EX.EXPRESSION_GROUP_ID     = INC_GR.EXPRESSION_GROUP_ID "
		selectQuery = selectQuery + " ORDER BY INC_PT.INCORRECT_PATTERN_NUM DESC "

		return selectQuery
	end
	private :selectQuery

end