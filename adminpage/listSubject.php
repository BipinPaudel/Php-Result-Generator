<?php
include("../includes/checksession.php");
include("../lib/config.php");

if (isset($_GET['idForDelete'])) {
	# code...
	$id=$_GET['idForDelete'];
	
	$query="Delete from subject where id='$id'";
	$resultForDelete=mysqli_query($conn,$query);
}
$semester="2";
if (isset($_POST['submitSemester'])) {
	# code...
	$semester=$_POST['subject_semester'];

}
$query="Select * from subject where semester='$semester'";
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
	<div class="class_for_margin">
	<?php if (isset($_SESSION['message'])) {
		# code...
	
		echo $_SESSION['message'];
		$_SESSION['message']=null;
		 
	} ?>
	<a href="addSubject.php"> <h2> Add new Subject </h2> </a>

	<form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="listSubject.php" role="form">
		<div class="form-group">
			<select class="form-control" name="subject_semester">
				<option selected value="1"> 1 </option>
                    <option value="2"> 2 </option>
			      	<option value="3"> 3 </option>
                	<option value="4"> 4 </option>
	                <option value="5"> 5 </option>
                    <option value="6"> 6 </option>
	                <option value="7"> 7 </option>
                    <option value="8"> 8 </option>
        	</select>
    	</div>
    	<div class="form-group">
        	<button type="submit" class="btn btn-primary btn-lg" name="submitSemester">Go</button>
    	</div>
	</form>



	<div class="tableclass">
	<table class="table table-hover">
		<thead>
			<tr>
				<th> Name </th>
				<th> Semester </th>
				<th> Total Marks </th>
				
			</tr>
		</thead>
			
		<tbody>
			<?php while ($row=mysqli_fetch_assoc($result)) { ?>
			<tr>

				<td> <?php echo $row['name']; ?> </td>
				<td> <?php echo $row['semester']; ?> </td>
				<td> <?php echo $row['total_marks']; ?> </td>
				
				<td> <a href="editSubject.php?id= <?php echo $row['id'];?> "> Edit </a>   </td>
				<td><a href="listSubject.php?idForDelete=<?php echo $row['id']; ?>"> Delete </a> </td>
			</tr>
			<?php } ?>
		</tbody> 
	</table>
</div>

</div>
</body>
</html>