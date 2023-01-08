<?php 
     include "classes/functions.php";
      $Obj = new Employee();
	  $uroll = $_SESSION['user_roll'];
	  $menuData = $Obj->getMenu($uroll);
      if($_SESSION['user_name']==''){
		  header('location:index.php');
	  }
	 
 $msg ='';
 if(isset($_POST['submit'])){
	     $param = [
			   'category_name'=>trim($_POST['category_name']),
			   'parent_category_id'=>$_POST['parent_category']
			   ];
			  
	    $result = $Obj->AddCategory('category',$param);
        //$result); die;		
		if($result['type']=='error'){
	        $msg = "<p class='text-danger center'>".$result['message']."</p>";
        }
        else{
	         header("location:category-list.php");    
       }
  }

  $categoryData = $Obj->Category();
  
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
	<h1 class="h3 mb-2 text-gray-800">Add Employee</h1>
	<div class="card shadow mb-4">
	<div class="card-header py-3">
	</div>
	  <div class="card-body">
       <form method="POST" name="validationForm" id="validationForm" enctype="multipart/form-data">
		<div class="form-group">
		<label for="category" class="">Parent category</label>
			<select name="parent_category" class="form-control" id="parent_category">
			<option>--category--</option>
			  <?php while($roll = $categoryData->fetch_array()) { 
			        echo"<option value='".$roll['category_id']."'>".$roll['category_name']."</option>";
			  }
			  ?>			  		 
			</select>
			<div id="catError"></div>
		    </div>	
		
		<div class="form-group">
			<input type="text" name="category_name" value="<?php if(isset($_POST['category_name'])){echo $_POST['category_name']; } ?>" class="form-control" id="category_name" placeholder="category Name">
			<?php if(isset($msg)){echo $msg; } ?>
		</div>
		
	           <input type="submit" name="submit" value="Add" id="checkCategory" class="btn btn-primary">
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
  <script>
      $(document).ready(function(){
	   
	   $('#checkCategory').on('click',function(){
		    var category = $('#parent_category').val();
			if(category =='--category--'){
				$('#catError').html('Select category');
				 $('#catError').css('color','red');
				return false;
			}
			
		  		   
	   });
	   
	  }); 
  </script>
</body>

</html>