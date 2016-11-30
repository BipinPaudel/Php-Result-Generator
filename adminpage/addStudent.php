<?php 
include("../includes/checksession.php");
include("../lib/config.php");
if(isset($_POST['submit'])){
		$name=$_POST['student_name'];
		$address=$_POST['student_address'];
		$batch=$_POST['student_batch'];
		$mobile=$_POST['student_mobile'];
		$email=$_POST['student_email'];
		$roll=$_POST['student_roll'];


      $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $content = $_POST['caption_text'];


    $folder="images/";



    // new file size in KB
    $new_size = $file_size/5000;
    // new file size in KB

    // make file name in lower case
    $new_file_name = strtolower($file);
    // make file name in lower case

    $final_file=str_replace(' ','-',$new_file_name);

    move_uploaded_file($file_loc,$folder.$final_file);
       



        $rollQuery= "Select * from student where roll='$roll'";
        $rollQueryQuery=mysqli_query($conn,$rollQuery);
        $rollAssoc=mysqli_fetch_assoc($rollQueryQuery);
        if (count($rollAssoc)>0) {
            # code...
            $_SESSION['message']="This roll number already exists";

        }

        else{
    $query= "Insert into student set name= '$name', address= '$address' ,roll='$roll', batch ='$batch', mobile='$mobile',email='$email',
    image='$final_file'";

    $result=mysqli_query($conn,$query);
    if ($result) {
        # code...
        header("Location:listStudent.php");
    }
    else{
        header("Location:../404.html");
        }
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
               

                    <?php
                    if (isset($_SESSION['message'])) {?> 
                    <div class="alert alert-danger">

                    <?php
                         
                    echo $_SESSION['message'];
                    $_SESSION['message']= null;    
                     } 


                     ?>
                </div>
                <br>
                <h4>Student Information </h4>
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="addStudent.php" role="form" 
                enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Full Name" name="student_name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Address"
                                name="student_address">
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
                                <input type="number" class="form-control" required="required" placeholder="Roll number" name="student_roll">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Mobile no." name="student_mobile">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" required="required" placeholder="Email Id"
                                name="student_email">
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" placeholder="Image" name="file">
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
