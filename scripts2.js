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
        text.clearRect(0, 0, myScore.width, myScore.height);
   //Update score
        score++;
        text.fillText("Score: " +score, 8, 20 );
       
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
      
      alert("Game Over!"  );
        if(score==0){
            document.getElementById("fail").style.display = 'none';
            var scoreHtml=document.getElementById("score");
     
    scoreHtml.value="0";
    document.getElementById("submit").style.display.hidden;
      document.getElementById("submit").click();
      document.getElementById("fail").style.display = 'none';
        }
      else{ document.getElementById("fail").style.display = 'none';
      
      var scoreHtml=document.getElementById("score");
     
    scoreHtml.value=score;
    document.getElementById("submit").style.display.hidden;
      document.getElementById("submit").click();
      document.getElementById("fail").style.display = 'none';
      }
    
     

      
    }
   
  }, 10);
   
  document.addEventListener("keydown", function (event) {
    
    jump();
    
  });
  
  






