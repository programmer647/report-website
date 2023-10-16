<?php


header('Location: subjects.php');
include_once("connection.php");
array_map("htmlspecialchars",$_POST);



$stmt = $conn->prepare("INSERT INTO tblsubjects (SubjectID,Subjectname,Teacher)VALUES (null,:subjectname,:teacher)");

$stmt->bindParam(':subjectname', $_POST["name"]);
$stmt->bindParam(':teacher', $_POST["teacher"]);
$stmt->execute();
$conn=null;

echo $_POST["name"]."<br>";
echo $_POST["teacher"]."<br>";

?>