require "cgi"
require "mysql"
require "rexml/document"

require "GlobalConstValue.rb"

require "Model/Util/InCorrectPattern.rb"
require "Model/Util/Answer.rb"
require "Model/Util/Ranking.rb"
require "Model/Util/DBconnectorFactory.rb"
require "Model/Util/ScoreComputer.rb"
require "Model/Util/ScoreDistribution.rb"
require "Model/Util/Float.rb"
require "Model/Util/Expression.rb"

require "Model/DBconnector/MySQLconnector.rb"
require "Model/DBconnector/TestMySQLconnector.rb"
require "Model/DBconnector/ProductionMySQLconnector.rb"

require "Model/Communication/Communication.rb"
require "Model/Communication/GetQuestion.rb"
require "Model/Communication/GetScoreDistribution.rb"
require "Model/Communication/SendResult.rb"
require "Model/Communication/GetRanking.rb"


require "View/View.rb"
require "View/InCorrectList.rb"
require "View/InCorrectPatternList.rb"