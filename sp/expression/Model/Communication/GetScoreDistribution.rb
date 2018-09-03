# ==============================================================================
# クラス名 : Model/GetScoreDistribution
# 作成日   : 2009/03/11
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : クライアントとの通信　スコア分布
# 
# ------------------------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================
class GetScoreDistribution < Communication
	
	def response()
		
		# DBを共有ロック
		dbConnect.query("LOCK TABLES EXTR_SCORE_DISTRIBUTION READ ")
		dbRes = @dbConnect.query("SELECT * FROM EXTR_SCORE_DISTRIBUTION ORDER BY 1")
		# DBの共有ロック解除
		dbConnect.query("UNLOCK TABLES ")
		
		# XML作成
		doc = REXML::Document.new 
		doc << REXML::XMLDecl.new('1.0', 'UTF-8') 
		responseGetScoreDistribution 	= doc.add_element("ResponseGetScoreDistribution") 
		status 				= responseGetScoreDistribution.add_element("Status").add_text("OK")
		scoreDomainList 	= responseGetScoreDistribution.add_element("ScoreDomainList")
		
		dbRes.each{ |no, from, to, times|
			scoreDomain = scoreDomainList.add_element("scoreDomain")
			scoreDomain.add_element("ScoreDomainNo").add_text(no.to_s)
			scoreDomain.add_element("ScoreDomainFrom").add_text(from.to_s)
			scoreDomain.add_element("ScoreDomainTo").add_text(to.to_s)
			scoreDomain.add_element("ScoreDomainTimes").add_text(times.to_s)
		}
		
		return doc
	end

end
