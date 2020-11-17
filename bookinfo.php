<?php
		$dbServername = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName="test";
		$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
		$sql = "select  *from book";
		$result = $conn-> query($sql);
?>

<html>
<head>

 <title> Flat Details </title>
 <link rel="stylesheet" type="text/css" href="dstyle.css">

 <style>
      body {background-color: #C6C6C6;}
</style>

</head>

<body>

	<ul>
    <li> <a href="logout.php">  logout </a></li> 
	<li> <a href="profile.php">  Profile </a></li>
	<li> <a href="bookinfo.php"> Booked House </a></li>
	

</ul>
<br>

 <h1 align="center" style="color:white;"> Flat Details </h1>


 <br>

<table>
		<tr>
			<th>Name </th>
			<th>Gender</th>
			<th>Email </th>
			<th>Phone </th>
			<th>Adult </th>
			<th>Children</th>
			<th>NID NO </th>
			<th>Flat Name </th>
			<th>Booking Date </th>
		</tr>
		<?php
				if($result->num_rows >0){
				 while($row = $result->fetch_assoc()){
			?>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['gender']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			<td><?php echo $row['adult']; ?></td>
			<td><?php echo $row['children']; ?></td>
			<td><?php echo $row['nidnumber']; ?></td>
			<td><?php echo $row['flatname']; ?></td>
			<td><?php echo $row['bookingdate']; ?></td>
			
			</tr>
			<?php
				 }
				}
				?>				
     </table>
</form>
</body>
</html>
