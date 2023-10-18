<?php
session_start(); 
if (!isset($_SESSION['name']))
{   
    header("Location:login.php");
}
?>

<?php

include_once("connection.php");

//header("Refresh:2; url= pupildoessubject.php");
echo("Added");
print_r($_POST);
$stmt = $conn->prepare("INSERT INTO Tblpupilstudies (UserID,SubjectID)VALUES (:UserID,:SubjectID)");

$stmt->bindParam(':UserID', $_POST["student"]);
$stmt->bindParam(':SubjectID', $_POST["subjects"]);

$stmt->execute();
$conn=null;



?>