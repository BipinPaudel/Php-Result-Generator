<?php
	include("../lib/config.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("includes/linkfile.php"); ?>
</head>
	<body>
		<?php include("includes/header.php");?>
		
		<section id="contact-page" class="container">
        <div class="row">
            <div class="col-sm-8">
                <h4>Student Information </h4>
                <?php  if (isset($_SESSION['message'])) { ?>
                    <div class="status alert alert-success" style="display: none"></div>
                    <?php
                    echo $_SESSION['message'];
                    $_SESSION['message']=null;

                                    }?>
                
                <form id="main-contact-form" class="contact-form" name="contact-form" method="GET" action="viewAllResult.php" role="form">
                    <div class="row">
                        <div class="col-sm-5">
                           Roll number
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Roll no"
                                name="student_roll">
                            </div>

                            Semester
                            <div class="form-group">
                               

                                <select  class="form-control" name="student_semester">
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
                                <button type="submit" class="btn btn-primary btn-lg" name="submitInfo">Go</button>
                            </div>
                        </div>
                       
                    </div>
                </form>
            </div><!--/.col-sm-8-->
        </section>
	</body>
</html>