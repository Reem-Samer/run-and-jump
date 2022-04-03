// Daniel Shiffman
// https://thecodingtrain.com/CodingChallenges/147-chrome-dinosaur.html
// https://youtu.be/l0HoJHc-63Q

// Google Chrome Dinosaur Game (Unicorn, run!)
// https://editor.p5js.org/codingtrain/sketches/v3thq2uhk

let unicorn;
let uImg;
let tImg;
let bImg;
let trains = [];
let soundClassifier;
var score=0;
function preload() {
  const options = {
    probabilityThreshold: 0.95
    
  };
  soundClassifier = ml5.soundClassifier('SpeechCommands18w', options);
  uImg = loadImage('unicorn.png');
  tImg = loadImage('train.png');
  bImg = loadImage('background.jpg');
}

function mousePressed() {
  trains.push(new Train());
}

function setup() {
  createCanvas(800, 450);
  unicorn = new Unicorn();
  soundClassifier.classify(gotCommand);
}

function gotCommand(error, results) {
  if (error) {
    console.error(error);
  }
  console.log(results[0].label, results[0].confidence);
  if (results[0].label == 'up') {
    unicorn.jump();
  }
}

function keyPressed() {
  if (key == ' ') {
    unicorn.jump();
  }
}

function draw() {
  if (random(1) < 0.005) {
    trains.push(new Train());
  }
//document.getElementById("back").style.backgroundImage(bImg);
  background(bImg);
  textSize(32);
  text("Score"+score, 10, 20, 70, 80);
  for (let t of trains) {
    t.move();
    t.show();
    if (unicorn.hits(t)) {
      //document.getElementById("score").innerHTML= "score" + --score;
      textSize(32);
      text(("Score"+ --score), 10, 20, 70, 80);
      
      console.log('game over');
      // noLoop();
       
    }
    
    if( score < -300){
      //document.getElementById("score").innerHTML= "Game Over";
      fill(247,32,32);
  textSize(32);
      textAlign(CENTER , CENTER);
      textStyle(BOLD);
      textSize(50)
      text(("Game Over!"), 375, 200);
      noLoop();
       
    }
  }
  
  unicorn.show();
  unicorn.move();
}
