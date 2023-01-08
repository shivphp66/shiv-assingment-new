<?php 
   include "classes/functions.php";
   $Obj = new Employee();
 
      if($_SESSION['user_name']==''){
		  header('location:index.php');
	  }
	  $user_roll = $_SESSION['user_roll'];
	  
     $menuData = $Obj->getMenu($user_roll);
	  if(isset($_GET['pid'])){
	      $pid = base64_decode($_GET['pid']);
	      $recodeDelete = $Obj->recodeDelete('employee',"id='$pid'");
	  }
    
       $empl = $Obj->profile($_SESSION['user_name']);	  
	  
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Profile</title>
<?php include('comman/comman_css.php'); ?>
</head>

<body id="page-top">
    <div id="wrapper">
 <?php include('comman/left-nav.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
               <?php include('comman/top-nav.php'); ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Profile</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
							 <span style="color:green;"><?php if(isset($_SESSION['success'])){ echo $_SESSION['success'];} unset($_SESSION['success']); ?></span>
							</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>User Type</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
									<?php while($list = $empl->fetch_array()){ ?>
                                        <tr>
                                            <td><?=$list['name']; ?></td>
                                            <td><?=$list['userName']; ?></td>
                                            <td><?=$list['email']; ?></td>
                                            <td><?=$list['phone']; ?></td>
                                            <td><?=$list['user_roll']; ?></td>
                                            <td><?=$list['create_at']; ?></td>
                                            <td>
											
                                         <?php 
										    $style='';
										    if($_SESSION['user_roll']=='junior_employee'){
					                             $style='none';
										        }  
				                              ?>											
											<a style="" href="edit-profile.php?eml=<?=base64_encode($list['id']); ?>">Edit</a>&nbsp;&nbsp;
																				
											</td>
                                        </tr>
									<?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
 <?php include('comman/comman_js.php'); ?>
</body>
</html>