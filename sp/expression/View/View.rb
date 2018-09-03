# ==============================================================================
# クラス名 : View/View
# 作成日   : 2009/06/20
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : ビュー　スーパークラス
# 
# ------------------------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================

class View

	def contentType()
		return "text/html"
	end

	attr_reader :executionMode
	attr_reader :dbConnect

	def initialize(executionMode=nil, dbConnect=nil)
		@executionMode  = executionMode
		@dbConnect  = dbConnect
	end

	def htmlHeader( title=nil)
		puts "<html>"
		puts "<head>"
		puts "	<title>#{title}</title>"
		puts "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />"
		puts "</head>"
	end 
	protected :htmlHeader

	def htmlFooter
		puts "</body>"
		puts "</html>"
	end
	protected :htmlFooter

end