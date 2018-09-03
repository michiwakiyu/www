#!/usr/local/bin/ruby -Ku

# コウキ・ローカルPC用Perlパス
#!/Program Files/ruby/bin/ruby -Ks

# lolipop用 Perlパス
#!/usr/local/bin/ruby -Ks


begin

	require "GlobalConstValue.rb"

	# 実行モード
	#executionMode = GlobalConstValue::TestMode			#テスト
	executionMode = GlobalConstValue::ProductionMode	#本番
	

	# クラスとライブラリのインポート
	require "RequireList.rb"

	# コンフィグの読み込み
	configXML = nil #後に使用するためここで宣言
	File.open("Config.xml") {|fp| 
	  configXML = REXML::Document.new fp 
	} 

	#リクエストパラメータの取得
	form = CGI.new

    
	# DB接続 clientRequestハッシュ作成時に引数として用いるためここで宣言。
	dbConectFactory = DBconnectorFactory.new #DBファクトリ生成
	dbConnect = dbConectFactory.create(executionMode) #適切なDBへのコネクタを作成
	dbConnect.open 
	
	
	clientRequestHash = {
		"GetQuestion"          		=> GetQuestion.new(executionMode, dbConnect, configXML),
		"SendResult"           		=> SendResult.new(executionMode, dbConnect, configXML, form[ configXML.elements['/Config/AnswerDataName'].text ]),
		"GetRanking"           		=> GetRanking.new(executionMode, dbConnect, configXML),
		"GetScoreDistribution" 		=> GetScoreDistribution.new(executionMode, dbConnect, configXML),
		"InCorrectList"        		=> InCorrectList.new(executionMode, dbConnect),
		"InCorrectPatternList" 		=> InCorrectPatternList.new(executionMode, dbConnect)
	}

	clientRequest = clientRequestHash[form["Type"]]

	puts "Content-type: #{clientRequest.contentType}\n\n" 

	if clientRequest.contentType == "text/xml"
		# レスポンスXMLの作成
		xmlDoc = clientRequest.response
		xmlDoc.write
	elsif  clientRequest.contentType == "text/html"
		clientRequest.show
	end
	
	dbConnect.close

rescue => ex
	puts "Content-type: text/xml\n\n"
	answerDataName = configXML.elements['/Config/AnswerDataName'].text

	open("Log/ErrorLog.csv", "a+"){ | errorLogFile |
	# エラーログの書込
		#t = Time.now
		errorLogFile.print "Time:" + Time.now.strftime("%Y/%m/%d %H:%M:%S")			 + ", "
		errorLogFile.print "Type:" + form["Type"]			 + ", "
		errorLogFile.print "#{answerDataName}:" + form[answerDataName]			 + ", "
		errorLogFile.print "Class:" + ex.class.to_s			 + ", "
		errorLogFile.print "Message:" + ex.message.to_s		 + ", "
		errorLogFile.print "Backtrace:" + ex.backtrace.to_s	 + "\n"
	}

	# DBのクローズ
	dbConnect.close
	
	puts "<Error>"
	puts "	<Class>" 		+ ex.class.to_s + "</Class>"
	puts "	<Message>" 		+ ex.message + "</Message>"
	puts "	<BackTrace>" 	+ ex.backtrace.to_s + "</BackTrace>"
	puts "	<Type>" 		+ form["Type"] + "</Type>"
	puts "	<#{answerDataName}>" + form[answerDataName] + "</#{answerDataName}>"
	puts "</Error>"
end
