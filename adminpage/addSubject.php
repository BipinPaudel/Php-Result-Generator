<?php
// include("../includes/checksession.php");
include("../lib/config.php");
    if (isset($_POST['submit'])) {
        # code...
        $subjectName=$_POST['subject_name'];
        $subjectMarks=$_POST['subject_marks'];
        $subjectSemester=$_POST['subject_semester'];

        $query="Insert into subject set name= '$subjectName ', total_marks='$subjectMarks' , semester='$subjectSemester'";
        echo $subjectName;
        //.$subjectSemester.$subjectMarks;
      
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
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="addSubject.php" role="form">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Subject Name" name="subject_name">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" required="required" placeholder="Total Marks" name="subject_marks">
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

                            

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg" name="submit">Add Subject</button>
                            </div>
                        </div>
                       
                    </div>
                </form>
            </div><!--/.col-sm-8-->
        </section>
</body>
</html>