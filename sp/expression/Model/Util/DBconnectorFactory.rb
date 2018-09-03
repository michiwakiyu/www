# ==============================================================================
# クラス名 : DBconnectorFactory
# 作成日   : 2009/03/08
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : 
# DBconnectorのファクトリクラス。
# ------------------------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================
class DBconnectorFactory
	attr_accessor :dbConnectorList; private :dbConnectorList=

	def initialize
		@dbConnectorList = [
			TestMySQLconnector.new,
			ProductionMySQLconnector.new
		]
	end

	def create(i=0)
		return @dbConnectorList[i]
	end

end