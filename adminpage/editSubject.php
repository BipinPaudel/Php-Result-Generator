<?php
include("../includes/checksession.php");
include("../lib/config.php");
	
	if (isset($_GET['id'])) {
		# code...
		$subjectId=$_GET['id'];
		$query="Select * from subject where id='$subjectId' ";
		$queryResult=mysqli_query($conn,$query);
		$subjects=mysqli_fetch_assoc($queryResult);
	}

	if (isset($_POST['submit'])) {
		# code...
		$subjectName=$_POST['subject_name'];
		$totalMarks=$_POST['subject_marks'];
		$semester=$_POST['subject_semester'];
		$subjectId=$_POST['subject_id'];
		echo $subjectName;
		echo $subjectId;
		$query="UPDATE subject SET name='$subjectName' ,total_marks='$totalMarks', semester='$semester' WHERE id='$subjectId' ";
		$result=mysqli_query($conn,$query);
		if ($result) {
			# code...
			header("Location:listSubject.php");
		}
		else{
			header("Location:../404.html");
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

	<section id="contact-page" class="container">
        <div class="row">
            <div class="col-sm-8">
                <h4>Student Information </h4>
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="editSubject.php" role="form">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Subject Name" name="subject_name" 
                                value= " <?php echo $subjects['name']; ?> " >
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" required="required" placeholder="Total Marks" name="subject_marks"
                                value= " <?php echo $subjects['total_marks']; ?> ">
                            </div>
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

                            <input type="hidden" value= "<?php echo $subjects['id']; ?>" name="subject_id"/>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg" name="submit">Update Subject</button>
                            </div>
                        </div>
                       
                    </div>
                </form>
            </div><!--/.col-sm-8-->
        </section>
</body>
</html>