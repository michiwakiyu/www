# ==============================================================================
# クラス名 : TestMySQLconnector
# 作成日   : 2009/03/07
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : 
# Test環境(浅利　光希レンタルのロリポップ)のMySQLとの接続を行うための抽象クラス。
# ------------------------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================
class TestMySQLconnector < MySQLconnector
	def initialize
		@dbServerName 	= "mysql32.lolipop.jp"
		@dbUserName 		= "LA05546117"
		@dbPassword 		= "fzvcws"
		@dbName 			= "LA05546117"
	end
end