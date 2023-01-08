<?php 
     include "classes/functions.php";
      $Obj = new Employee();
	   $uroll = $_SESSION['user_roll'];
	  $menuData = $Obj->getMenu($uroll);
      if($_SESSION['user_name']==''){
		  header('location:index.php');
	  }
	 
 $msg ='';
 $empid = $_SESSION['uid'];
 if(isset($_POST['submit'])){
	   $password= md5(trim($_POST['password']));
       
	    $result = $Obj->changePassword($password,$empid);
		if($result){
	        header("location:profile.php"); 
        }
        
  }

   $userRoll = $Obj->getUserRoll($uroll);
  
 ?>	  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Employee</title>
<?php include('comman/comman_css.php'); ?>
</head>

<body id="page-top">
    <div id="wrapper">
 <?php include('comman/left-nav.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
               <?php include('comman/top-nav.php'); ?>
   <div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Change Password</h1>
	<div class="card shadow mb-4">
	<div class="card-header py-3">
	</div>
	  <div class="card-body">
       <form method="POST" name="validationForm" id="validationForm" enctype="multipart/form-data">
		
		<div class="form-group">
			<input type="password" name="password" class="form-control" id="password" placeholder="Password">
		</div>
		    <input type="submit" name="submit" value="Change" class="btn btn-primary">
	          </form>
			</div>
         </div>
        </div>
       </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
 <?php include('comman/comman_js.php'); ?>
</body>

</html>