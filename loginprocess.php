<?php
session_start(); 
if (!isset($_SESSION['name']))
{   
    header("Location:login.php");
}
?>

<?php
session_start();
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT * FROM tblusers WHERE surname =:username ;" );
$stmt->bindParam(':username', $_POST['Username']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    $hashed = $row['Pword'];
    $attempt= $POST['passwd'];
    if(password_verify($attempt, $hashed)){
        header('Location: users.php');
        $_SESSION['name']=$row['surname'];
        
    }else{

        header('Location: login.php');
    }
}
$conn=null;
?>
