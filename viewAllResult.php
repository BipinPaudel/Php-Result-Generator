<?php
	include("lib/config.php");
	if (isset($_GET['submitInfo'])) {
		# code...
		$roll=$_GET['student_roll'];
		$semester=$_GET['student_semester'];

		$studentIdQuery="Select id from student where roll='$roll'";
		$studentIdQueryQuery=mysqli_query($conn,$studentIdQuery);
		$studentIdAssoc=mysqli_fetch_assoc($studentIdQueryQuery);
		$studentId=$studentIdAssoc['id'];

		$checkQuery="Select * from student_mark where stid='$studentId' and semester='$semester'";
		$checkQueryQuery=mysqli_query($conn,$checkQuery);
		$checkQueryAssoc=mysqli_fetch_assoc($checkQueryQuery);
		
		
		if (count($checkQueryAssoc) ==0 ) {
			# code...
			header("Location:viewResult.php");
			$_SESSION['message']="Result not added";

		}



		$finalQuery="Select subject.name, subject.total_marks,student_mark.obtained_marks from subject 
		inner join student_mark on
		subject.id=student_mark.suid where stid='$studentId' and student_mark.semester='$semester' ";



		$finalQueryQuery=mysqli_query($conn,$finalQuery);
		//echo count(mysqli_fetch_assoc($finalQueryQuery));
		
		//$finalQueryAssoc=mysqli_fetch_assoc($finalQueryQuery);

	
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
		<div align="right"><input type="button" onclick="printDiv('printableArea')" value="Print Result" /></div>
		<div class="class_for_margin" id="printableArea">
		<h1 align="center"> Deerwalk Institute of Technology </h1>
		<?php 
		$studentQuery="Select * from student where roll='$roll' ";
		$studentInfo=mysqli_query($conn,$studentQuery);
		$row1=mysqli_fetch_assoc($studentInfo);?>
		<h3>Name: <strong><?php echo $row1['name']; ?> </strong></h3> 
		<h3>Batch:<strong> <?php echo $row1['batch']; ?> </strong></h3>
		<img src="adminpage/images/<?php echo $row1['image']; ?>" align="right" height="100px" width="100px">
		<h3> <strong> <?php echo $semester; ?><sup>th </sup> Semester </strong> </h3>


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
		 
		 		
		 		while ($row=mysqli_fetch_assoc($finalQueryQuery)) {
		 			# code...
		 			
		 	?>
		 	<tr>
		 		<td> <?php echo $row['name']; ?> </td>
		 		<td> <?php echo $row['total_marks']; ?> </td>
		 
		 
		 		 <td>  <?php echo $row['obtained_marks']; ?> </td> 				
		 
		 	 
		 		<?php $fullMarks = $fullMarks + intval($row['total_marks']); 
		 				$obtainedMarks = $obtainedMarks + intval($row['obtained_marks']); ?>
		 	
		 	</tr>
		 	<?php } ?>
		 	
		 </tbody> 


	</table>	 
		
	<?php echo "Full Marks: ". $fullMarks; 	?> <br>
	<?php echo "Obtained Marks: ". $obtainedMarks; ?> <br>
	<?php echo "Percentage: ". ($obtainedMarks/$fullMarks)*100; ?>
	</div>

	
	<script> 
		function printDiv(divName) {
        	var printContents = document.getElementById(divName).innerHTML;
        	var originalContents = document.body.innerHTML;
        	document.body.innerHTML = printContents;
        	window.print();
        	document.body.innerHTML = originalContents;
    }
	</script>
	</body>

</html>