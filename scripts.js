const student = document.getElementById("student");
const fail = document.getElementById("fail");
let counter =0;
var jaudio = new Audio('human-jump.mp3');
var oaudio = new Audio('game-over.mp3');
var myScore = document.getElementById("myScore");
var text = myScore.getContext("2d");
var score = 0;

    alert(" Press ok to start!");
    
function jump() {
  jaudio.play();
    if (student.classList != "jump") {
      student.classList.add("jump");
      jaudio.play();
      setTimeout(function () {
        score++;
        student.classList.remove("jump");
      }, 300);
    } 
   
  }


  let isAlive = setInterval(function () {

    // get current dino Y position
    let studentTop = parseInt(window.getComputedStyle(student).getPropertyValue("top"));
  
    // get current cactus X position
    let failleft = parseInt(
      window.getComputedStyle(fail).getPropertyValue("left")
    );
   
    // detect collision
    if (failleft < 50 && failleft > 0 && studentTop >= 140) {
      // collision
      oaudio.play();
      alert("Game Over \n you failed with score ="+score+"! ");
      var scoreHtml=document.getElementById("score");
    scoreHtml.value=score;
    document.getElementById("submit").style.display.hidden;
      document.getElementById("submit").click();
     
    }

  }, 10);
  
  document.addEventListener("keydown", function (event) {
    
    jump();
    
  });
  
  function Score() {
    
    text.font = "16px Arial";
    text.fillStyle = "red";
    text.fillText("Score: "+ score , 8, 20 );

  }

  
  var interval = setInterval(Score, 10);
  






