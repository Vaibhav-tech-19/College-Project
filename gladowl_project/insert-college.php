<?php

   $Name=$_POST['collegeName'];
   $Email=$_POST['ContactMail'];
   $address=$_POST['collegeLocation'];
   $contact=$_POST['ContactPerson'];
  
   include('db_connection.php');

    //Insert query
    $sql= "INSERT INTO `college-data` (`collegeName`,`Address`,`ContactPerson`,`mail-id`) 
    VALUES ('$Name','$address','$contact','$Email')";
      
      
   	if($conn->query($sql))
    {
        include('success_modal.html');
    }
   	
    else
    {
        echo "Error: ".$sql."<br>".$conn->error;
    }

   	$conn->close();

?>