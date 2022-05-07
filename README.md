# run-and-jump
![Screenshot](college.png)


 In this project, we built a jump and run browser game that built into Google Chrome web browser. Our players had to avoid the F failure by jumping above it to achieve the higher score, all players can challenge each other and win by achieving the highest score.

# Look & Feel:
In our game we wanted to do a related design to our life in college, so we set the character to be a student that wants to avoid obstacles which in this case is failing classes -getting an F in a class.

We wanted to add more fun and interactive things so the user can enjoy playing the game so we add hover and click functions so that if the user hovers or clicks over some objects it can change background color, shadow, and or font color.

# Dynamic Components:
We used javascript to interact with the game, the class was called script2.js.

Student and F (Fail) variables are defined and linked to classes more than one variable has been defined using a time element the document method getElementById() returns an element object representing the element whose identifier property matches the given string.
New Object has also been defined in the audio variable, which is the Audio Generator creates and returns a new HTMLAudioElement that can be used either to add audio components to a document for users to interact with or listen to or off-screen to manage and play audio files.
The function jump ()and play() was used so that the student can start the game. One of the tasks that this function performs is setTimeout() the global specifies a timer that executes a specific function or piece of code once the timer has expired.
Cleartext has been included the clearRect() method sets the pixels in a rectangular area to transparent black. The upper left corner of the rectangle is at ( myScore.width, myScore.height), and its volume is specified by width and height the parameter had the width and length of the score.
Finally, we used the file text, which is a fillText() is a method for a 2D drawing context. The fillText() method allows you to draw a text string in a format with the fill derived from the current fill pattern. Add to it the points earned by the student.
A function has been created in the name of setInterval().It had the status of the student , F and how to stop the game When the student fails to jump from the F, we add the if condition so that the game will stop so that it will show "game over".
The figure below shows the function.php file code:
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
