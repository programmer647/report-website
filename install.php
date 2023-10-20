<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblUsers;
CREATE TABLE TblUsers 
(UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Gender VARCHAR(1) NOT NULL,
Surname VARCHAR(20) NOT NULL,
Forename VARCHAR(20) NOT NULL,
Password VARCHAR(200) NOT NULL,
House VARCHAR(20) NOT NULL,
Year INT(2) NOT NULL,
Role TINYINT(1))");
$stmt->execute();
$stmt->closeCursor();
$hashed_password = password_hash("password", PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO Tblusers(UserID,Surname,Forename,Gender,Password,Year,House,Role)VALUES
(NULL,'Smith','John','M',:hp,10,'Laxton',0),
(NULL,'Cunniffe','Robert','M',:hp,0,'St A',1),
(NULL,'Strachan','Ally','F',:hp,0,'Wyatt',1),
(NULL,'Hector','Bass','M',:hp,10,'St A',0)
");
$stmt->bindParam(':hp', $hashed_password);
$stmt->execute();
$stmt->closeCursor();



$stmt = $conn->prepare("DROP TABLE IF EXISTS TblSubjects;
CREATE TABLE TblSubjects 
(SubjectID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Subjectname VARCHAR(20) NOT NULL,
Teacher VARCHAR(20) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();
$stmt=$conn->prepare("INSERT INTO TblSubjects(SubjectID,Subjectname,Teacher)VALUES
(NULL,'Maths','Strachan'),
(NULL,'Computing','Cunniffe;)
");

$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblPupilStudies;
CREATE TABLE TblPupilStudies
(Userid INT(4),
Subjectid INT(4),
Classposition INT(2),
Classgrade CHAR(1),
Exammark INT(2),
Comment TEXT,
PRIMARY KEY(Subjectid, Userid))");
$stmt->execute();
$stmt->closeCursor();


?>
