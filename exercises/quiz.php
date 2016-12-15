


	<?php
	    include '../home_header.php';
	?>
<style>
.col-sm-6{
  border: solid 1px #D8D8D8;
  padding: 10px;
}
.pageMovement{
  margin-top: 25px;
}
<style>
<script>

</script>
</head>
<body>
<div class="container">
<h1>Welcome to my Quiz</h1>
<div class="row">
<div class="col-sm-12">
<h2>Question <span></span></h2>
<p> Question ....</p>

</div>
<p>Feedback<p>

<p>choose the following options</p>
</div>



<div class="row">
<div class="col-sm-6">
<p>Answer ....</p>
</div>
<div class="col-sm-6">
<p>Answer ....</p>
</div>
<div class="col-sm-6">
<p>Answer ....</p>
</div>
<div class="col-sm-6">
<p>Answer ....</p>
</div>
</div>
<div class="row pageMovement">
<div class="col-xs-5 btn btn-primary"> Previous
</div>
<div class="col-xs-5 col-xs-offset-4 btn
btn-primary">Next</div>
</div>
</div>
</body>
</html>
=======
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>JavaScript Quiz Project</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<style>
.col-sm-6 {
	padding: 10px;
}
.pageMovement {
	margin-top: 25px;
}
.answer {
	margin-left: auto;
	margin-right: auto;
	display: block;
	width: 80%;
	font-weight: bold;
}
.container {
	padding:20px;

}
.hide {
	display: none;
}
.show {
	display: block;
}
.progress {
	margin-top: 25px;
}
#finishQuiz {
	margin-top: 25px;
}
.output {
	font-size:20px;
}
.glyphicon-ok-circle{
	color:#00FF64;
}
.glyphicon-remove-circle{
	color:#FF0004;
}
.selAnswer {
	background: #4E9267;
}
</style>
</head>
<body>
<div class="container">
  <h1>Welcome to my Quiz</h1>
  <div id="quizContent" class="row quiz">
    <div class="col-sm-12">
      <h2 id="quizHeader"></h2>
    </div>
    <div id="questions" class="row">
      <div class="col-sm-6"> <a data-id="1" class="btn btn-default answer ">1</a> </div>
      <div class="col-sm-6"> <a data-id="2" class="btn btn-default answer ">2</a> </div>
      <div class="col-sm-6"> <a data-id="3" class="btn btn-default answer ">3</a> </div>
      <div class="col-sm-6"> <a data-id="4" class="btn btn-default answer ">4</a> </div>
    </div>

  <div class="row pageMovement">
    <div id="btnPrevious" class="col-xs-5 col-sm-4 btn btn-primary pull-left">Previous</div>
    <div id="btnNext" class="col-xs-5 col-sm-4 col-sm-offset-4 col-xs-offset-2 btn btn-primary pull-right">Next</div>
  </div>
  <div class="row ">
    <div id="finishQuiz" class=" btn btn-success btn-block  hide ">Submit Quiz</div>
  </div>
  <div class="row progress">
    <div id="progressBar" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:50%"> 0% Complete </div>
  </div>  </div>
</div>
</body>
</html>
<script>
var curPage = 0,
    correct = 0;
var myAnswers = [];
var myQuiz = [
    ["What is addEventListener() used for?", 1, "attach a click event", "nothing", "never use it", "listens to HTML"],
    ["What does DOM stand for", 1, "Document Object Model ", "Document Over Mountains", "Do Over Models", "Nothing"],
    ["What does BOM stand for", 4, "document Object Model", "nothing", "Big Object Model", " Browser Object Model "]
];
var myHeader = document.getElementById("quizHeader");
var classname = document.getElementsByClassName("answer");
var myQuestion = document.getElementById("questions");
var progressBar = document.getElementById("progressBar");
var btnNext = document.getElementById("btnNext");
var btnPrevious = document.getElementById("btnPrevious");
var btnFinish = document.getElementById("finishQuiz");
checkPage();
btnNext.addEventListener("click", moveNext);
btnPrevious.addEventListener("click", moveBack);
btnFinish.addEventListener("click", endQuiz);
for (var i = 0; i < classname.length; i++) {
    classname[i].addEventListener('click', myAnswer, false);
}

function myAnswer() {
    var idAnswer = this.getAttribute("data-id");
    /// check for correct answer
    myAnswers[curPage] = idAnswer;
    if (myQuiz[curPage][1] == idAnswer) {
        //console.log('Correct Answer');
    } else {
        //console.log('Wrong Answer');
    }
    addBox();
}

function addBox() {
    for (var i = 0; i < myQuestion.children.length; i++) {
        var curNode = myQuestion.children[i];
        if (myAnswers[curPage] == (i + 1)) {
            curNode.classList.add("selAnswer");
        } else {
            curNode.classList.remove("selAnswer");
        }
    }
}

function moveNext() {
    ///check if an answer has been made
    if (myAnswers[curPage]) {
        //console.log('okay to proceed');
        if (curPage < (myQuiz.length - 1)) {
            curPage++;
            checkPage(curPage);
        } else {
            ///check if quiz is completed
            //console.log(curPage + ' ' + myQuiz.length);
            if (myQuiz.length >= curPage) {
                endQuiz();
            } else {
                //console.log('end of quiz Page ' + curPage);
            }
        }
    } else {
        //console.log('not answered');
    }
}

function endQuiz() {
    if (myAnswers[2]) {
        var output = "<div class='output'>Quiz Results<BR>";
        var questionResult = "NA";
        //console.log('Quiz Over');
        for (var i = 0; i < myAnswers.length; i++) {
            if (myQuiz[i][1] == myAnswers[i]) {
                questionResult = '<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>';
                correct++;
            } else {
                questionResult = '<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>';
            }
            output = output + '<p>Question ' + (i + 1) + ' ' + questionResult + '</p> ';
        }
        output = output + '<p>You scored ' + correct + ' out of ' + myQuiz.length + '</p></div> ';
        document.getElementById("quizContent").innerHTML = output;





    } else {
        //console.log('not answered');
    }
}

function checkPage(i) {
    /// add remove disabled buttons if there are no more questions in que
    if (curPage == 0) {
        btnPrevious.classList.add("hide");
    } else {
        btnPrevious.classList.remove("hide");
    }
    if ((curPage + 1) < (myQuiz.length)) {
        btnNext.classList.remove("hide");
    } else {
        btnNext.classList.add("hide");
        btnFinish.classList.remove("hide");
    }
    myHeader.innerHTML = myQuiz[curPage][0];
    for (var i = 0; i < myQuestion.children.length; i++) {
        var curNode = myQuestion.children[i];
        curNode.childNodes[1].innerHTML = capitalise(myQuiz[curPage][(i + 2)]);
        //check if answered already
        if (myAnswers[curPage] == (i + 1)) {
            curNode.classList.add("selAnswer");
        } else {
            curNode.classList.remove("selAnswer");
        }
    }
    ///update progress bar
    var increment = Math.ceil((curPage) / (myQuiz.length) * 100);
    progressBar.style.width = (increment) + '%';
    progressBar.innerHTML = (increment) + '%';
}

function moveBack() {
    if (curPage > 0) {
        curPage--;
        checkPage(curPage);
    } else {
        //console.log('end of quiz Page ' + curPage);
    }
}

function capitalise(str) {
    return str.substr(0, 1).toUpperCase() + str.substr(1);
}
</script>
