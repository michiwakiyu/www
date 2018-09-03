# ==============================================================================
# クラス名 : Expression
# 作成日   : 2009/03/17
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : 
# 誤答パターンの記録。
# ------------------------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================
class Expression

	def initialize(dbConnect)
		@dbConnect = dbConnect
	end

	def update(answer)

		# 更新SQL作成
		updateQuery = ""
		updateQuery = updateQuery + "UPDATE EXTR_EXPRESSION "

		if answer.correctExpressionID == answer.selectExpressionID
			updateQuery = updateQuery + "SET CORRECT_NUM = CORRECT_NUM  + 1 "
		elsif answer.correctExpressionGroupID == answer.selectExpressionGroupID
			updateQuery = updateQuery + "SET PART_CORRECT_NUM  = PART_CORRECT_NUM   + 1 "
		elsif answer.correctExpressionGroupID != answer.selectExpressionGroupID
			updateQuery = updateQuery + "SET INCORRECT_NUM  = INCORRECT_NUM   + 1 "
		end

		updateQuery = updateQuery + " WHERE EXPRESSION_ID           = '#{answer.correctExpressionID}' "


		@dbConnect.query( updateQuery )
		
	end
	
end
