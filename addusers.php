<?php
session_start(); 
if (!isset($_SESSION['name']))
{   
    header("Location:login.php");
}
?>


<?php


header('Location: users.php');
include_once("connection.php");
array_map("htmlspecialchars",$_POST);



switch($_POST["role"]){
	case "Pupil":
		$role=0;
		break;
	case "Teacher":
		$role=1;
		break;
	case "Admin":
		$role=2;
		break;
}



$stmt = $conn->prepare("INSERT INTO TblUsers (UserID,Gender,Surname,Forename,Password,House,Year ,Role)VALUES (null,:gender,:surname,:forename,:password,:house,:year,:role)");

$stmt->bindParam(':forename', $_POST["forename"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':house', $_POST["house"]);
$stmt->bindParam(':year', $_POST["year"]);
$hashed_password=password_hash($POST["Pword"], PASSWORD_DEFAULT);
$stmt->bindParam(':password', $hashed_password);
$stmt->bindParam(':gender', $_POST["gender"]);
$stmt->bindParam(':role', $role);
$stmt->execute();
$conn=null;

?>
