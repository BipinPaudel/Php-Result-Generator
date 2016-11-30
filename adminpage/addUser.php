<?php
include("../includes/checksession.php");
include("../lib/config.php");
    if (isset($_POST['submit'])) {
        # code...
        $name=$_POST['name'];
        $username=$_POST['username'];
        $role =$_POST['role'];
        $status=$_POST['status'];
        $password=$_POST['password'];
        echo $status;
        // exit;
        $query="Insert into user set name= '$name ', username='$username', password='$password',role='$role',status='$status'";
        
        $result=mysqli_query($conn,$query);
        if ($result) {
        # code...
        header("Location:listUser.php");
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
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="addUser.php" role="form">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Name" name="name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Username" name="username">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                            
                                <select class="form-control" name="role">
                                	<option  value="superadmin"> SuperAdmin </option>
                                	<option selected value="admin"> Admin </option>
                                
                                </select>
                            </div>
                            <div class="form-group">
                            
                                <select class="form-control" name="status">
                                    <option  value="active"> Active </option>
                                    <option selected value="inactive"> InActive </option>
                                
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg" name="submit">Add User</button>
                            </div>
                        </div>
                       
                    </div>
                </form>
            </div><!--/.col-sm-8-->
        </section>
</body>
</html>