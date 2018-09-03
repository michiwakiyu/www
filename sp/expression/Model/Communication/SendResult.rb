# ==============================================================================
# クラス名 : Model/SendResult
# 作成日   : 2009/04/04
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : クライアントとの通信　解答結果の送信
# 
# ------------------------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================
class SendResult < Communication
	
	# プレイヤー名
	attr_reader :playerName
	# 登録可否
	attr_reader :registration
	# 解答の配列
	attr_reader :answerList

	def response()
	
		sendResultXML = nil
		sendResultXML = REXML::Document.new @clientData

		#File.open("SendResult.xml") {|fp|
		#   sendResultXML = REXML::Document.new fp
		#} 

		# POSTデータをインスタンス変数に格納する。
		importSendResult(sendResultXML)

		# 受信データのエラーチェック
		errorCheck()

		# 正解回数と合計解答時間（平均を計算するため）を計算する。また誤答があればそのパターンを登録する。
		totalAnswerSecond = 0
		collectNum = 0
		@answerList.each{ | answer |
			if answer.correctExpressionID == answer.selectExpressionID then
				collectNum = collectNum + 1
			else
				# 誤答パターンを登録する。
				InCorrectPattern.new(@dbConnect).update(answer)

			end
			
			totalAnswerSecond = totalAnswerSecond + answer.answerSecond

			# 出題回数を記録する
			Expression.new(@dbConnect).update(answer)
		}

		# 平均解答時間 = 合計解答時間 ÷ 問題数 
		avgAnswerSecond = (totalAnswerSecond / @answerList.size).round_n(-2)

		# スコア計算する。
		totalScore = ScoreComputer.new.execution(@answerList, @configXML)

		# ランキングに登録する。
		getRank = 0
		if @registration == "OK" then
			getRank = Ranking.new(@dbConnect, @configXML).update( @playerName, avgAnswerSecond, collectNum, totalScore )
		end

		# ランキングを更新しなかった場合、ベストスコア、ベストランクを取得する。
		# ランキングに無い場合は、どちらも0
		if getRank == 0 then
			currentRank  = Ranking.new(@dbConnect, @configXML).selectCurrentRankExecution(@playerName)
			bestScore = Ranking.new(@dbConnect, @configXML).selectBestScoreExecution(@playerName)
		else 
			nowRank  = 0
			bestScore = 0
		end

		# スコア分布に登録する。
		ScoreDistribution.new(@dbConnect).update(totalScore)

		return REXML::Document.new "<ResponceSendResult><GetRank>#{getRank.to_s}</GetRank><GetScore>#{totalScore.to_s}</GetScore><currentRank>#{currentRank.to_s}</currentRank><BestScore>#{bestScore.to_s}</BestScore></ResponceSendResult>"
	end
	
	# POSTデータをインスタンス変数に格納する。
	def importSendResult(sendResultXML)

		# プレイヤー名
		@playerName = sendResultXML.elements['/SendResult/PlayerName'].text

		# 登録可否。名無しは登録しない。
		if @playerName == nil then
			@registration = "NO"
		else
			@registration = sendResultXML.elements['/SendResult/Registration'].text
		end

		@answerList = Array.new

		sendResultXML.elements.each("/SendResult/AnswerList/Answer"){|answer|
			
			@answerList.push(
				Answer.new(
					answer.elements['CorrectExpressionID'].text,
					answer.elements['CorrectExpressionGroupID'].text,
					answer.elements['SelectExpressionID'].text,
					answer.elements['SelectExpressionGroupID'].text,
					answer.elements['AnswerSecond'].text.to_f
				)
			)
		}
	end

	# エラーチェック
	def errorCheck()
		if @answerList.size > @configXML.elements['/Config/QuestionNum'].text.to_i then
		# 規定の問題数より、解答数の方が多い。
			raise "The number of answers is more than the number of problems. "
		end

		if @playerName.split(//u).length > @configXML.elements['/Config/PlayerNameLength'].text.to_i then
		# プレイヤー名が長い。
			raise "Player name is long. " + @playerName + "P:" + @configXML.elements['/Config/PlayerNameLength'].text + "I:" + @playerName.split(//u).length.to_s
		end

	end
end
