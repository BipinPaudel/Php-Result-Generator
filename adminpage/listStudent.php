<?php 
// include("../includes/checksession.php");
include("../lib/config.php");

if (isset($_GET['id'])) {
	# code...
	$id=$_GET['id'];
	$query="Delete from student where id='$id'";
	$result=mysqli_query($conn,$query);

}
$batch='2017';
if (isset($_POST['submitBatch'])) {
	# code...
	$batch=$_POST['student_batch'];

}
$query= "Select * from student where batch='$batch'";
$result=mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("../includes/linkfile.php");
	?>

</head>
<body>
	<?php
	include("adminincludes/adminheader.php");
	?>

	<a href="addStudent.php"> <h2><u> Add new Student</u> </h2> </a>
	<form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="listStudent.php" role="form">
		<div class="form-group">
			<select class="form-control" name="student_batch">
				<option selected value="2020"> 2020 </option>
            	<option value="2019"> 2019 </option>
            	<option value="2018"> 2018 </option>
            	<option value="2017"> 2017 </option>
        	</select>
    	</div>
    	<div class="form-group">
        	<button type="submit" class="btn btn-primary btn-lg" name="submitBatch">Go</button>
    	</div>
	</form>
<div class="tableclass">
	<table class="table table-hover">
		<thead>
			<tr>
				<th> Name </th>
				<th> Email </th>
				<th> Address </th>
				<th> Mobile </th>
			</tr>
		</thead>
			
		<tbody>
			<?php while ($row=mysqli_fetch_assoc($result)) { ?>
			<tr>

				<td> <?php echo $row['name']; ?> </td>
				<td> <?php echo $row['name']; ?> </td>
				<td> <?php echo $row['name']; ?> </td>
				<td> <?php echo $row['name']; ?> </td>
				<td> <a href=""> Edit </a>   </td>
				<td><a href="listStudent.php?id=<?php echo $row['id']; ?>"> Delete </a> </td>
			</tr>
			<?php } ?>
		</tbody> 
	</table>
</div>
</body>
</html>