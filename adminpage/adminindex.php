<?php 
include("../includes/checksession.php");
include("../lib/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("../includes/linkfile.php");?>


	<script type="text/javascript">
		function showBatch(){
			document.getElementById("showBatch").style.visibility='visible'
		}
	</script>
</head>
<body>
	<?php
	include("adminincludes/adminheader.php");
	?>

	<div class="class_for_margin">
	<h2> Enter marks </h2>

	
<form id="main-contact-form" class="contact-form" name="contact-form" method="get" action="addMarks.php" role="form">
	<div class="row">
        <div class="col-sm-5">	
        Semester	
			<div class="form-group">
	        	<select   class="form-control" name="subject_semester">
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
		Batch
	     	<div class="form-group">                              

		        <select  class="form-control" name="student_batch">
		        	<option selected value="2020"> 2020 </option>
		        	<option value="2019"> 2019 </option>
		        	<option value="2018"> 2018 </option>
		        	<option value="2017"> 2017 </option>
		        </select>
		    </div>

		    <div class="form-group">
		        <button type="submit" class="btn btn-primary btn-lg" name="submitInfo">Go</button>
		    </div>
		</div>
	</div>
</form>
</div>
</body>

</html>