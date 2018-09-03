# ==============================================================================
# クラス名 : Answer
# 作成日   : 2009/03/15
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : 
# 解答クラス。
# ------------------------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================
class Answer
	attr_reader :correctExpressionID			# 正解表情ID
	attr_reader :correctExpressionGroupID		# 正解表情グループID
	attr_reader :selectExpressionID				# 選択表情ID
	attr_reader :selectExpressionGroupID		# 選択表情グループID
	attr_reader :answerSecond					# 解答時間（秒数）
	
	def initialize(correctExpressionID,correctExpressionGroupID,selectExpressionID,selectExpressionGroupID,answerSecond)
		@correctExpressionID		 = correctExpressionID
		@correctExpressionGroupID	 = correctExpressionGroupID
		@selectExpressionID			 = selectExpressionID
		@selectExpressionGroupID	 = selectExpressionGroupID
		@answerSecond				 = answerSecond
	end
	
	
end