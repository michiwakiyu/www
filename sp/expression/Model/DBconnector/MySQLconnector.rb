# ==============================================================================
# クラス名 : MySQLconnector
# 作成日   : 2009/03/07
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : 
# MySQLとの接続を行うための抽象クラス。
# ------------------------------------------------------------------------------
# 変更履歴 :
# 2012/01/09 浅利　光希 MySQL5への移行に対応
# ==============================================================================
class MySQLconnector
	attr_accessor :dbServerName; 	protected :dbServerName=
	attr_accessor :dbUserName; 		protected :dbUserName=
	attr_accessor :dbPassword; 		protected :dbPassword=
	attr_accessor :dbName; 			protected :dbName=

	attr_accessor :mysqlConnect; 	protected :mysqlConnect=

	# DBロックの種類
	ReadLock  = "READ"
	WriteLock = "WRITE"

	def open
		@mysqlConnect = Mysql::new(@dbServerName,@dbUserName,@dbPassword, @dbName)
		@mysqlConnect.query( "SET NAMES UTF8" )
	end

	def query( sqlString )
		response = @mysqlConnect.query( sqlString )
		return response
	end 

	def lock( lockType, tableName )
	# DBロック用ブロック
		begin
			#print "DBを手動コミットモードにする。<br>"
			query("SET AUTOCOMMIT=0 ")
			#print "DBの#{lockType}ロック<br>"
			query("LOCK TABLES #{tableName}  #{lockType} ")
			
			yield()
			
			#print "正常終了:コミット<br>"
			query("COMMIT ")
			
		rescue => ex
			#print "異常終了:ロールバック<br>"
			query("ROLLBACK  ")
			#print "DB関連以外の例外処理を上位のプログラムに委任する。<br>"
			raise ex
		ensure
			#print "DBの#{lockType}ロック解除<br>"
			query("UNLOCK TABLES ")
		end
	end 


	def close
		@mysqlConnect.close
	end
	
end