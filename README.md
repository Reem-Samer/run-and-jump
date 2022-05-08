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

     

      
  
# Business Logic:
Business logic is the programming that manages communication between an end-user interface and a database. Business logic describes the sequence of operations associated with data in a database to carry out the business rule. In our project, we will talk about the structure of the database and the authentication step.
# Database Structure:
The database contains one table for users, when the user signs up, the database stores his/her unique id, name, password, date of account creation, and score with a default value of zero. When the user plays and gets a new score, his/her score the database updates the score to the last score the player gains.
# Authentication Step:
The player must enter his name and password to create an account, using a form. The form content has an input type text to enter his name, an input type password to enter his password and an input type submit to sign up.
When the user presses sign up, the inserted data is processed in the signup.php file, see figers3 below, the username and password are taken from the form and stored in variables and the id is generated randomly, after that an insertion query is added to insert all these data to the database as a new row.



But if the user already had an account he has to login. The login form has an input type text to enter the username, and an input type password to enter the user password..



When the user presses log in, a query will be added that selects user data from the users' table based on the inserted username, then the inserted password with the stored password will be compared, if they are equal the user can log in otherwise the website will ask the user to try again.

#Getting highest Score:
An invisible form in the index.php file that has an input type text to store the score and an input type submit to process data in score.php file, this file will store the score by a query that updates the user score based on his name. When the user finishes the game his score will be immediately updated in the database and then a table that arranges the users’ scores in descending order will appear. This table is created in order.php file, here the users’ names and scores will be fetched from the database using a query that selects the users' names and scores and orders them in descending order, and finally, print them in the table.
