<?php
//creat conection :)
$server = 'localhost';
$user = 'root';
$password = "";
$dbname = 'school';

$conn = mysqli_connect($server,$user,$password,$dbname);

//check conection

if (!$conn) {
    // die("conection faild : ". mysqli_connect_error());
    die("conection faild : ". $conn -> connect_error);
} else{
    echo '<br>. conection succes..';
}   

//get data form

$name = $_POST['name'];
$id = $_POST['id'];
$tele = $_POST['tp'];
$subject = $_POST['subject'];
$dob = $_POST['dob'];

$sql = " INSERT INTO
 `teachers`(`T_ID`, `Name`, `Tele`, `subject`, `dob`) 
 VALUES ('$id','$name','$tele','$subject','$dob')";

 if ($conn -> query($sql) === TRUE)  {
    echo "record updated succesfully :)";
    # code...
 } else{
    echo "update faild";
 }

 $conn -> close();

?>