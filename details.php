<?php
		$dbServername = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName="test";
		$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
		$sql = "select  *from registrationform";
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
    <li> <a href="admin.html">  Admin </a></li>
    <li> <a href="form.html."> Owner Form </a></li>
	<li> <a href="welcome.html"> Home </a></li>

</ul>
<br>

 <h1 align="center" style="color:white;"> Flat Details </h1>


 <br>

<table>
		<tr>
			<th>Owner Name </th>
			<th>Phone</th>
			<th>Flat Serial </th>
			<th>Flat Name </th>
			<th>Phone Number </th>
			<th>Gas bill </th>
			<th>Electricity bill </th>
			<th>Water bill </th>
			<th>Service Charge</th>
			<th>House bill</th>
			<th>Total</th>
			<th>Click Below</th>
		</tr>
		<?php
				if($result->num_rows >0){
				 while($row = $result->fetch_assoc()){
			?>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			<td><?php echo $row['flatserial']; ?></td>
			<td><?php echo $row['flatname']; ?></td>
			<td><?php echo $row['flatphonenumber']; ?></td>
			<td><?php echo $row['gasbill']; ?></td>
			<td><?php echo $row['electricitybill']; ?></td>
			<td><?php echo $row['waterbill']; ?></td>
			<td><?php echo $row['servicebill']; ?></td>
			<td><?php echo $row['housebill']; ?></td>
			<td><?php echo $row['total']; ?></td>
			<td><a href="Book.html"><button  type="Book">Book</button></a></td>
			</tr>
			<?php
				 }
				}
				?>				
     </table>
</form>
</body>
</html>
