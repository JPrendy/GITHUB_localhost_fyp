function populate(){
  if(quiz.isEnded()){
    showScores(); 
 }
 else{
   //show question
   
   var element = document.getElementById("question");
   element.innerHTML = quiz.getQuestionIndex().text;
   
   //show choices
   var choices = quiz.getQuestionIndex().choices;
   for(var i= 0; i < choices.length; i++){
	   var element = document.getElementById("choice" + i);
	   element.innerHTML = choices[i];
	   guess("btn" + i, choices[i]);
   }
   
   showProgress();
 }
};

function guess(id, guess){
	var button = document.getElementById(id);
	button.onclick = function(){
	  quiz.guess(guess);
	  populate();
	}
}


function showScores() {
  var gameOverHtml ="<h1>Result</h1>";
  gameOverHtml += "<h2 id='score'> Your scores: " + quiz.score + "</h2>";
  var element = document.getElementById("quiz");
 element.innerHTML = gameOverHtml;  
};

//make a function that declares the quiz.score to a php variable

function showProgress(){
	var currentQuestionNumber = quiz.questionIndex + 1;
	var element = document.getElementById("progress");
	element.innerHTML = "Question " + currentQuestionNumber + "of" + quiz.questions.length;
}


var questions =[
 new Question("which is one plus two?", ["3", "4", "5", "6"], "3"),
  new Question("which is one plus three?", ["3", "4", "5", "6"], "3")
];

var quiz = new Quiz(questions);

populate();
