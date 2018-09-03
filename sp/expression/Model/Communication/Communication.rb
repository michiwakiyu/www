# ==============================================================================
# クラス名 : Model/Communication
# 作成日   : 2009/04/04
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : クライアントとの通信　スーパークラス
# 
# ------------------------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================
class Communication

	attr_reader :executionMode
	attr_reader :dbConnect
	attr_reader :configXML
	attr_reader :clientData
	
	def contentType()
		return "text/xml"
	end

	def initialize(executionMode=nil, dbConnect=nil, configXML=nil, clientData=nil)
		@executionMode  = executionMode
		@dbConnect  = dbConnect
		@configXML  = configXML
		@clientData = clientData
	end

end