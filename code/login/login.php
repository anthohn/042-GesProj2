<?php
session_start();

   
  if (isset($_POST['username'])) {
// Try and log the user in
      $connect = mysqli_connect("localhost","root","root") or die ("could not connect ");
	  mysqli_select_db($connect,"login") or die ("could not find database"); 
      $username = mysqli_real_escape_string($connect,$_POST['username']);
      $password = mysqli_real_escape_string($connect,$_POST['password']); 
      
      $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($connect,$sql);      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if((mysqli_num_rows($result) == 1)) {
		  $results = mysqli_fetch_array($result);
   		         header("location: ../src/php/home.php");
     	  }
		  else {
         header("location: erreur.php");
      }
   }
?>
