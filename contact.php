<? include ("top.php");?>

<body id = "form"> 
    <? include ("nav.php") ;?>
<img src="LAX.png" alt="descriptive text" />
<?php

 //Connecting to database

require_once('../bin/myDatabase.php');

$dbUserName = get_current_user() . '_admin';
$whichPass = "a"; //flag for which one to use.
$dbName = strtoupper(get_current_user()) . '_CS148';

$thisDatabase = new myDatabase($dbUserName, $whichPass, $dbName);


$debug = false;
if (isset($_GET["debug"])) { // ONLY do this in a classroom environment
    $debug = true;
}
if ($debug)
    print "<p>DEBUG MODE IS ON</p>";


//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1b Security
//
// define security variable to be used in SECTION 2a.
$yourURL = $domain . $phpSelf;

// Initializing variables and set to empty values
$nameErr = $emailErr = $yearErr = $messageErr = $typeErr = "";
$name = $email = $year = $message = $type =  "";



//Sanitizing information and creating error messages for each variable
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }
     
  
  

   if (empty($_POST["message"])) {
       $messageErr = "Please explain your reason for contacting us.";
     $message = "";
   } else {
     $message = test_input($_POST["message"]);
   
   }

   if (empty($_POST["year"])) {
     $yearErr = "Year is required";
   } else {
     $year = test_input($_POST["year"]);
   }
     if (empty($_POST["type"])) {
     $typeErr = "Message Type is required";
   } else {
     $type = test_input($_POST["type"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

//preparing messages to be sent to guest and admin
$mailed = false;
$messageGuest = "";

$mailAdmin = false;
$messageAdmin = "";
?>

<h2>Contact Us</h2>
<p><span class="error">* required field.</span></p>
<form id = "form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <Legend>The following information will be sent to the president of the club and kept track of in our files.</Legend>
    <fieldset>
   Name: <input type="text" name="name">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   
   E-mail: <input type="text" name="email">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
   
   Message Type:    <select name="type">
                        <option value="Just Starting">Just Starting</option>
                        <option value="Practice Info">Practice Info</option>
                        <option value="Game Info" >Game Info</option>
                        <option value="Other">Other</option>
                    </select>
   <span class="error">* <?php echo $typeErr;?></span>
   <br><br>
   
   Message: <textarea name="message" rows="5" cols="40"></textarea>
   <span class="error">* <?php echo $messageErr;?></span>
   <br><br>
  
   Gender:
   <input type="radio" name="year" value="freshman">Freshman
   <input type="radio" name="year" value="sophomore">Sophomore
   <input type="radio" name="year" value="junior">Junior
   <input type="radio" name="year" value="senior">Senior
   <span class="error">* <?php echo $yearErr;?></span>
   <br><br>
   
   
   <input type="submit" name="submit" value="Submit"> 
    </fieldset>
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $type;
echo "<br>";
echo $message;
echo "<br>";
echo $year;
?>

</body>
</html>
        
        
        
     



