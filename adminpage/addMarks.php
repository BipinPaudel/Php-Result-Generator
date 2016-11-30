<?php
// include("../includes/checksession.php");
include("../lib/config.php");
	if (isset($_GET['submitInfo'])) {
		# code...
		$batch= $_GET['student_batch'];
		$semester=$_GET['subject_semester'];

		$query="Select * from student where batch='$batch'";
		$result=mysqli_query($conn,$query);
	}
?>

<html lang="en">
<head>
	<?php include("../includes/linkfile.php");
	?>



</head>
<body>
	<?php
	include("adminincludes/adminheader.php");
	?>
<div class="class_for_margin">
	<div class="tableclass">
	<table class="table table-hover">
		<thead>
			<tr>
				<th> Name </th>
				<th> Email </th>
				<th> Address </th>
				<th> Mobile </th>
				<th> Status </th>
			</tr>
		</thead>
			
		<tbody>
			<?php while ($row=mysqli_fetch_assoc($result)) { ?>
			<tr>

				<td> <?php echo $row['name']; ?> </td>
				<td> <?php echo $row['email']; ?> </td>
				<td> <?php echo $row['address']; ?> </td>
				<td> <?php echo $row['mobile']; ?> </td>
				<td>
					<?php
						$stid= $row['id'];

						$query1="select * from student_mark where stid='$stid' and semester=' $semester ' ";

						$queryMarks=mysqli_query($conn,$query1);
						$queryAssoc=mysqli_fetch_assoc($queryMarks);
				
						if (count($queryAssoc)>0) {
							# code...
							echo "Added";
						}
						else{
							echo "Not added";
						}
					 ?>
				</td>
				<td> <a href="marksForm.php?

					studentId=<?php echo $row['id'];?>&
					semester=<?php echo $semester; ?> "     > Marks form </a></td>
			</tr>
			<?php } ?>
		</tbody> 
	</table>
</div>
	


</div>
</body>
</html>