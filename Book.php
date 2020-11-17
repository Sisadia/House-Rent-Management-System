<?php
$name = $_POST['username'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$adult = $_POST['adult'];
$children = $_POST['children'];
$nidnumber = $_POST['nidnumber'];
$flatname = $_POST['flatname'];
$bookingdate = $_POST['bookingdate'];
if (!empty($name) || !empty($gender) || !empty($email) || !empty($phone) || !empty($adult) ||!empty($children) ||!empty($nidnumber) ||!empty($flatname) ||!empty($bookingdate)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "test";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From book Where email = ? Limit 1";
     $INSERT = "INSERT Into book (name,gender, email, phone , adult , children , nidnumber , flatname, bookingdate) values(?, ?, ?, ?, ?, ?, ?,?,?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssssss", $name, $gender, $email, $phone , $adult , $children , $nidnumber , $flatname, $bookingdate);
      $stmt->execute();
      echo "New record inserted sucessfully";
	  Header("Location:details.php");
     } else {
      echo "Someone already used this email, try another!";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>