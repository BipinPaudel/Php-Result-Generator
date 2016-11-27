<?php
	include("lib/config.php");
	if (isset($_GET['submitInfo'])) {
		# code...
		$roll=$_GET['student_roll'];
		$semester=$_GET['student_semester'];

		$subjectQuery="Select * from subject where semester='$semester'";
		$subjectQueryStorage=mysqli_query($conn,$subjectQuery);

		$fullMarks=0;
		$obtainedMarks=0;

		}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("includes/linkfile.php"); ?>
</head>
	<body>
		<?php include("includes/header.php");?>
		<h1> Deerwalk Institute of Technology </h1>
		<?php 
		$studentQuery="Select * from student where roll='$roll' ";
		$studentInfo=mysqli_query($conn,$studentQuery);
		$row1=mysqli_fetch_assoc($studentInfo);?>
		<h2> <?php echo $row1['name']; ?></h2> 
		<h2> <?php echo $row1['batch']; ?> </h2>


		<table class="table table-hover">
		<thead>
			<tr>
				<th> Subject </th>
				<th> Full marks </th>
				<th> Obtained marks </th>
				
			</tr>
		</thead>
			
		<tbody>
			<?php 

				$stid=$row1['id'];
				while ($row=mysqli_fetch_assoc($subjectQueryStorage)) {
					# code...
			?>
			<tr>
				<td> <?php echo $row['name']; ?> </td>
				<td> <?php echo $row['total_marks']; ?> </td>

				<?php
					$rid=$row['id'];
					
					$obtainedQuery="Select obtained_marks from student_mark where stid= '$stid' and suid= '$rid'";
					$obtainedAction=mysqli_query($conn,$obtainedQuery);
					$obtained=mysqli_fetch_assoc($obtainedAction);
				?>
				 <td>  <?php echo $obtained['obtained_marks']; ?> </td> 				

			 
			<?php $fullMarks = $fullMarks + intval($row['total_marks']); 
			$obtainedMarks = $obtainedMarks + intval($obtained['obtained_marks']); ?>
			
			<td> <?php echo count($obtained); ?> </td>

				
				<!-- <td> <a href=""> Edit </a>   </td> -->
				<!-- <td><a href="listStudent.php?id=<?php echo $row['id']; ?>"> Delete </a> </td> -->
			</tr>
			<?php } ?>
			
		</tbody> 
	</table>	 
		
	<?php echo "Full Marks ". $fullMarks; 	?> <br>
	<?php echo "Obtained Marks ". $obtainedMarks; ?> <br>
	<?php echo "Percentage ". ($obtainedMarks/$fullMarks)*100; ?>

	</body>
</html>