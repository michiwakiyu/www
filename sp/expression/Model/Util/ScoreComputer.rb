# ==============================================================================
# クラス名 : ScoreComputer
# 作成日   : 2009/03/15
# 作成者   : 浅利　光希
# ------------------------------------------------------------------------------
# 説明     : 
# スコアの計算。
# ------------------------------------------------------------------------------
# 変更履歴 :
# 
# ==============================================================================
class ScoreComputer
	@@CorrectScore		= 0.5
	@@SameGroupScore	= 0.2
	@@InCorrectScore	= 0.0

	def initialize
		@timeScoreRelationList = [
			TimeScoreRelation.new( Float::MIN,      -0.01,  0),
			TimeScoreRelation.new(       0.00,       0.25, 10),
			TimeScoreRelation.new(       0.26,       0.50,  9),
			TimeScoreRelation.new(       0.51,       0.75,  8),
			TimeScoreRelation.new(       0.76,       1.00,  7),
			TimeScoreRelation.new(       1.01,       1.50,  6),
			TimeScoreRelation.new(       1.51,       2.00,  5),
			TimeScoreRelation.new(       2.01,       2.50,  4),
			TimeScoreRelation.new(       2.51,       3.00,  3),
			TimeScoreRelation.new(       3.01,       5.00,  2),
			TimeScoreRelation.new(       5.01,      10.00,  1),
			TimeScoreRelation.new(      10.01, Float::MAX,  0)
		]
	end

	def execution(answerList, configXML)
	
		questionNum = configXML.elements['/Config/QuestionNum'].text.to_i # 問題数
		if answerList.size > questionNum
		#例外検査
			raise "Number of answers is more than Number of questions"
		end
		
		maxScore = maxScoreCompute(answerList, questionNum)
		
		totalScore = 0
		answerList.each{ | answer |
			totalScore = totalScore + oneAnswerCompute(answer)
		}

		return totalScore #(totalScore / maxScore * 100 ).round_n(-2)
	end
	
	def maxScoreCompute(answerList, questionNum) 
	#100点満点にするために最高スコアを計算する。
	
		#経過時間による重み付けの中で最良の物を探す。
		scoreWeightList = Array.new
		@timeScoreRelationList.each{ | timeScoreRelationList |
			# scoreWeightのみを配列に移す
			scoreWeightList.push( timeScoreRelationList.scoreWeight )
		}
		
		bestScoreWeight = scoreWeightList.max
		
		# 最高スコア = 正解による得点×問題数×経過時間による重み付け（最良）
		maxScore = @@CorrectScore * questionNum * bestScoreWeight
	end

	def oneAnswerCompute(answer)
	# 一つの解答の取得スコアを計算する
		#経過時間による重み付け
		scoreWeight=0
		@timeScoreRelationList.each{ | timeScoreRelation |
			if timeScoreRelation.fromSecond <= answer.answerSecond and answer.answerSecond <= timeScoreRelation.toSecond 
				scoreWeight = timeScoreRelation.scoreWeight
				break
			end
		}
		
		#スコア計算
		score=0
		if answer.correctExpressionID == answer.selectExpressionID
		#○であるかの判定
			score = @@CorrectScore * scoreWeight
		elsif answer.correctExpressionGroupID == answer.selectExpressionGroupID
		#△であるかの判定
			score = @@SameGroupScore * scoreWeight
		else
		#×である
			score = @@InCorrectScore * scoreWeight
		end
		
		return score
	end

	def disp_timeScoreRelationList
	# テスト用　経過時間とスコアの重み付けの対応を全表示
		puts "<table>"
		@timeScoreRelationList.each{ | timeScoreRelation |
			puts "<tr>"
			puts "<td>From:"		+ timeScoreRelation.fromSecond.to_s		 + "</td>"
			puts "<td>To:" 			+ timeScoreRelation.toSecond.to_s		 + "</td>"
			puts "<td>ScoreWeight:" + timeScoreRelation.scoreWeight.to_s	 + "</td>"
			puts "</tr>"
		}
		puts "</table>"
	end
end


class TimeScoreRelation
#経過時間とスコアの重み付けの対応
	attr_reader :fromSecond
	attr_reader :toSecond
	attr_reader :scoreWeight

	def initialize(fromSecond, toSecond, scoreWeight)
		@fromSecond = fromSecond
		@toSecond = toSecond
		@scoreWeight = scoreWeight
	end
end