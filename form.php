<?php
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$flatserial = $_POST['flatserial'];
$flatname = $_POST['flatname'];
$flatphonenumber = $_POST['flatphonenumber'];
$gasbill = $_POST['gasbill'];
$electricitybill = $_POST['electricitybill'];
$waterbill = $_POST['waterbill'];
$servicebill = $_POST['servicebill'];
$housebill = $_POST['housebill'];
$total = $_POST['total'];
if (!empty($name) || !empty($gender) || !empty($email) || !empty($phone ) || !empty($flatserial) || !empty($flatname ) || !empty($flatphonenumber) || !empty($gasbill) || !empty($electricitybill) || !empty($waterbill) || !empty($servicebill) || !empty($housebill) || !empty($total)) {
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname="test";

	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From registrationform Where email = ? Limit 1";
     $INSERT = "INSERT Into registrationform (name,gender,email,phone,flatserial,flatname,flatphonenumber,gasbill,electricitybill,waterbill,servicebill,housebill,total) values(?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?)";
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
      $stmt->bind_param("sssissiiiiiii",$name,$gender,$email,$phone,$flatserial,$flatname,$flatphonenumber,$gasbill,$electricitybill,$waterbill,$servicebill,$housebill,$total);
      $stmt->execute();
      echo "New record inserted sucessfully";
	  header("Location:details.php");
     } else {
      echo "Someone already used this email, try another!";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All fields are required";
 die();
}
?>