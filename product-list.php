<?php 
     include "classes/functions.php";
     $Obj = new Employee();
 
      if($_SESSION['user_name']==''){
		  header('location:index.php');
	  }
	  $pid = base64_decode($_GET['pid']); 
	  $user_roll = $_SESSION['user_roll'];
	  $recodeDelete = $Obj->recodeDelete('products',"product_id='$pid'");
      $menuData = $Obj->getMenu($user_roll);
    
      $product = $Obj->ProductList();
	
	?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product List</title>
<?php include('comman/comman_css.php'); ?>
</head>

<body id="page-top">
    <div id="wrapper">
 <?php include('comman/left-nav.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
               <?php include('comman/top-nav.php'); ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Product List</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><a href="add-product.php">Add Product</a></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Image</th>
                                            <th>produc</th>
                                            <th>price</th>
                                            <th>Bran</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
									<?php 
									     $s =1; 
										 while($plist = $product->fetch_array()){
										  ?>
                                        <tr>
                                            <td><?=$s; ?></td>
                                            <td><img src="images/<?=$plist['image']; ?>" width="50px" height="100px"></td>
                                            <td><?=$plist['product_name']; ?></td>
                                            <td><?=$plist['price']; ?></td>
                                            <td><?=$plist['brand_name']; ?></td>
                                            <td><?=$plist['category_name']; ?></td>
                                            <td><?=$plist['created_at']; ?></td>
                                            <td><?=$plist['status']; ?></td>
                                            <td>
											<a href="edit-product.php?pid=<?=base64_encode($plist['product_id']); ?>">Edit</a>&nbsp;&nbsp;
											<a href="product-list.php?pid=<?=base64_encode($plist['product_id']); ?>">Del</a>
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