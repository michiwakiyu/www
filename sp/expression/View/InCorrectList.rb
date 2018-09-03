# ==============================================================================
# クラス名 : View/InCorrectList
# 作成日   : 2009/06/20
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : ビュー　誤答一覧
# 
# ------------------------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================

class InCorrectList < View

	def show
		
		dbRes = dbConnect.query( selectQuery )

		htmlHeader("誤答一覧")

		puts "<body>"
		puts "<table border='2'>"

		tableHeader

		rowCount = 0
		dbRes.each{ | 	expressionId, expressionName, 
						incorrectNum, avgIncorrectTime |

			puts "	<tr align='right'>"
			puts "		<td>#{expressionId.to_s}</td>"
			puts "		<td align='left'>#{expressionName.to_s}</td>"
			puts "		<td>#{incorrectNum.to_s}</td>"
			puts "		<td>#{avgIncorrectTime.to_s}</td>"
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
		puts "		<td colspan='1'>表情ID</td>"
		puts "		<td colspan='1'>表情名</td>"
		puts "		<td colspan='1'>合計<br>誤答回数</td>"
		puts "		<td colspan='1'>平均<br>解答時間</td>"
		puts "	</tr>"
	end
	private :tableHeader

	def selectQuery
		selectQuery = ""
		selectQuery = selectQuery + "SELECT EX.EXPRESSION_ID,  "
		selectQuery = selectQuery + "       EX.EXPRESSION_NAME , "
		selectQuery = selectQuery + "       SUM( PT.INCORRECT_PATTERN_NUM )                  TOTAL_INC_NUM,  "
		selectQuery = selectQuery + "       ROUND( AVG( PT.AVG_INCORRECT_PATTERN_TIME ), 2 ) AVG_INC_TIME "
		selectQuery = selectQuery + "  FROM EXTR_INCORRECT_PATTERN PT, "
		selectQuery = selectQuery + "       EXTR_EXPRESSION EX "
		selectQuery = selectQuery + " WHERE PT.DELETE_FLAG IS NULL "
		selectQuery = selectQuery + "   AND EX.EXPRESSION_ID = PT.EXPRESSION_ID "
		selectQuery = selectQuery + "GROUP BY EX.EXPRESSION_ID, EX.EXPRESSION_NAME "
		selectQuery = selectQuery + "ORDER BY TOTAL_INC_NUM DESC "

		return selectQuery
	end
	private :selectQuery

end