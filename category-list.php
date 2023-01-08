<?php 
   include "classes/functions.php";
   $Obj = new Employee();
   if($_SESSION['user_name']==''){
		  header('location:index.php');
	  }
     $cid = base64_decode($_GET['cid']); 
	 $uroll = $_SESSION['user_roll'];
     $menuData = $Obj->getMenu($uroll);
	 $recodeDelete = $Obj->recodeDelete('category',"category_id='$cid'");
      
	  
	  $user_roll = $_SESSION['user_roll'];
	  
       $category = $Obj->getCategory();
	
      
	  
	?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Category</title>
<?php include('comman/comman_css.php'); ?>
</head>

<body id="page-top">
    <div id="wrapper">
 <?php include('comman/left-nav.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
               <?php include('comman/top-nav.php'); ?>
               
                <div class="container-fluid">

                    <h1 class="h3 mb-2 text-gray-800">Category</h1>
                  
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><a href="add-category.php">Add Category</a></h6><br>
							 <span style="color:green;"><?php if(isset($_SESSION['success'])){ 
							   echo $_SESSION['success'];} unset($_SESSION['success']); ?></span>
							   
							   <span style="color:red;"><?php if(isset($_SESSION['error'])){ 
							   echo $_SESSION['error'];} unset($_SESSION['error']); ?></span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
										    <th>S No</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>                                            
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
									<?php
                                          $s=1;									
									      while($list = $category->fetch_array()){?>
                                        <tr>
                                            <td><?=$s; ?></td>                                           
                                            <td><?=$list['Parent']; ?></td>
                                              <td><?=$list['category_name']; ?></td>                                            
                                            <td><?php echo $list['status']==1?'yes':'No'; ?></td>
                                            <td><a href="edit-category.php?cid=<?=base64_encode($list['category_id']); ?>">Edit</a>&nbsp;
											    <a href="category-list.php?cid=<?=base64_encode($list['category_id']); ?>">Del</a>
											</td>
                                        </tr>
                                       <?php $s++; } ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
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