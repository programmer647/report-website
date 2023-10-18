<?php
session_start(); 
if (!isset($_SESSION['name']))
{   
    header("Location:login.php");
}
?>

<?php
session_start(); 
if (!isset($_SESSION['name']))
{   
    header("Location:login.php");
}
?>

<?php

include_once('connection.php');
echo("</br>");

$stmt=$conn ->prepare("SELECT * FROM tblusers");
$stmt ->execute();

while ($row = $stmt ->fetch(PDO::FETCH_ASSOC))
{
    echo($row["Forename"].' '.$row["Surname"].' '.$row["House"]."</br>");
}

?>