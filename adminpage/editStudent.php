<?php 
include("../includes/checksession.php");
include("../lib/config.php");

if (isset($_GET['id'])) {
    # code...

    $studentId=$_GET['id'];

    $query="select * from student where id= '$studentId'";
    $studentQuery=mysqli_query($conn,$query);
    $students=mysqli_fetch_assoc($studentQuery);
    // echo $students['name'];
    // exit;
}

if(isset($_POST['submit'])){
		$name=$_POST['student_name'];
		$address=$_POST['student_address'];
		$batch=$_POST['student_batch'];
		$mobile=$_POST['student_mobile'];
		$email=$_POST['student_email'];
		$image=$_POST['student_image'];
        $roll=$_POST['student_roll'];

        $studentId=$_POST['studentId'];
     
	$query= "update student set name= '$name', address= '$address' ,roll='$roll', batch ='$batch', mobile='$mobile',email='$email',
    image='$image'  where id = '$studentId'";

	$result=mysqli_query($conn,$query);
	if ($result) {
		# code...
		header("Location:listStudent.php");
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
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="editStudent.php" role="form">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="student_name" 
                                value= "<?php echo $students['name']; ?>" >
                            </div>

                            <input type="hidden" value="<?php echo $students['id']; ?> " name="studentId"/>

                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="student_address"
                                value="<?php echo $students['address']; ?>">
                            </div>
                            <div class="form-group">
                               

                                <select  class="form-control" name="student_batch">
                                	<option selected value="2020"> 2020 </option>
                                	<option value="2019"> 2019 </option>
                                	<option value="2018"> 2018 </option>
                                	<option value="2017"> 2017 </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="student_roll"
                                value= "<?php echo $students['roll']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="student_mobile"
                                value="<?php echo $students['mobile']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" name="student_email"
                                value="<?php echo $students['email']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Image" name="student_image">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg" name="submit">Add Student</button>
                            </div>
                        </div>
                       
                    </div>
                </form>
            </div><!--/.col-sm-8-->
        </section>
</body>
</html>