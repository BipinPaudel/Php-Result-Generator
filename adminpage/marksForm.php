<?php
// include("../includes/checksession.php");
include("../lib/config.php");


// if (isset($_POST['submitMarks'])) {
// 	# code...
// 	$queryForAllSubjectId="Select id from subject";
// 	$resultForAllSubjectId=mysqli_query($conn,$queryForAllSubjectId);

// 	$allId=array();
// 	while ($row=mysqli_fetch_assoc($resultForAllSubjectId)) {
// 		# code...
// 		array_push($allId, $row['id']);
// 	}
// 	for ($i=0; $i <sizeof($allId) ; $i++) { 
// 		# code...
		
// 	}

// }
if (isset($_GET['studentId']) && isset($_GET['semester']) ) {

	# code...
	$studentId=$_GET['studentId'];
	$semester=$_GET['semester'];
	

	



	$queryForSubject="Select * from subject where semester='$semester'";
	$resultForSubject=mysqli_query($conn,$queryForSubject);


}

if (isset($_POST['submitMarks']) && isset($_POST['studentId']))  {
	# code...
	$studentId=$_POST['studentId'];

if(count($_POST["subjects"])>0)
	{
		for($i=0;$i<count($_POST["subjects"]);$i++)
		{
			$fieldname = $_POST["subjects"][$i];
			$sql = "insert into student_mark set stid=$studentId,suid='".$_POST["subjects"][$i]."',obtained_marks='".$_POST[$fieldname]."'";
			$result=mysqli_query($conn,$sql);

		}
		header("Location:adminindex.php");

	}
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
	
	<h1> Hello Handsome <?php echo $nameOfStudent; ?> </h1>

	

<form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="marksForm.php" role="form">
	<table class="table table-hover">
		<thead>
			<tr>
				<th> Subject </th>
				<th> Marks Field</th>
				
			</tr>
		</thead>
			
		<tbody>
			<input type="hidden" name="studentId" value=" <?php echo $studentId; ?>"/>
			<?php while ($row=mysqli_fetch_assoc($resultForSubject)) { ?>
			<tr>

				<td><?php echo $row['name']; ?></td>
				<td> 
					
						<input type="hidden" name="subjects[]" value="<?php  echo $row['id']; ?>";>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">

                                <input type="number" class="form-control" required="required" placeholder="Obtained Marks" name="<?php  echo $row['id']; ?>">
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg" name="submitMarks">Add Marks</button>
                            </div>
                        </div>
                    </div>
                </td>
			</tr>
			
		</tbody> 
	</table>


	

</body>
</html>