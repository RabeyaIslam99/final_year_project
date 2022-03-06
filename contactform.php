<?php include('partials-font/menu.php'); ?>

<?php 
  //creating connection to database

  //check whether submit button is pressed or not
if((isset($_POST['submit'])))
{
  //fetching and storing the form data in variables
$Name = $conn->real_escape_string($_POST['name']);
$Email = $conn->real_escape_string($_POST['email']);
$Phone = $conn->real_escape_string($_POST['contact']);
$comments = $conn->real_escape_string($_POST['text']);
  //query to insert the variable data into the database
$sql="INSERT INTO inbox (name, email, 	message, text) VALUES ('".$Name."','".$Email."', '".$Phone."', '".$comments."')";
  //Execute the query and returning a message
if(!$result = $conn->query($sql)){
die('Error occured [' . $conn->error . ']');
}
else
   echo "Thank you! We will get in touch with you soon";
}
?>
