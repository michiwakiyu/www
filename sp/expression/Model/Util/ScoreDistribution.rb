# ==============================================================================
# クラス名 : ScoreDistribution
# 作成日   : 2009/03/17
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : 
# スコア分布の登録。
# ----------------(--------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================
class ScoreDistribution

	def initialize(dbConnect)
		@dbConnect = dbConnect
	
		#更新対象となるスコア分布No
		@scoreDistributionNoList = [
			 1, #添字  0,  0～ 10
			 1, #添字  1,  0～ 10
			 2, #添字  2, 11～ 20
			 3, #添字  3, 21～ 30
			 4, #添字  4, 31～ 40
			 5, #添字  5, 41～ 50
			 6, #添字  6, 51～ 60
			 7, #添字  7, 61～ 70
			 8, #添字  8, 71～ 80
			 9, #添字  9, 81～ 90
			10  #添字 10, 91～100
		]
	end

	def update(score)
		# スコアから、参照するスコア分布Noリストの添え字を算出する。
		i = ( (score.ceil-1)/10 ).truncate + 1
		
		# テスト用
		#print "<p>Score:" + score.to_s + " DistributionNo:" + @scoreDistributionNoList[i].to_s + "</p>"
		
		# 更新対象のスコア分布No
		updateDistributionNo = @scoreDistributionNoList[i].to_s
		
		updateQuery = ""
		updateQuery = updateQuery + "UPDATE EXTR_SCORE_DISTRIBUTION "
		updateQuery = updateQuery + "   SET SCORE_DISTRIBUTION_TIMES = SCORE_DISTRIBUTION_TIMES + 1 "
		updateQuery = updateQuery + " WHERE SCORE_DISTRIBUTION_NO = '" + updateDistributionNo + "'"
		
		# 更新実行
		@dbConnect.query(updateQuery)
		
	end
	

end
