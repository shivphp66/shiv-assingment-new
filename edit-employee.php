<?php 
     include "classes/functions.php";
      $Obj = new Employee();
	  $uroll = $_SESSION['user_roll'];
	  $userRoll = $Obj->userRoll('user_roll',$uroll);
	  $menuData = $Obj->getMenu($uroll);
      if($_SESSION['user_name']==''){
		  header('location:index.php');
	  }
	 
 $msg ='';
 $eml = base64_decode($_GET['eml']);
 
 /*if(isset($_POST['submit'])){
	 if($_POST['password1']==''){
		$password = $_POST['password2']; 		 
	 }
	 else{
		 $password = md5(trim($_POST['password1']));
	     }
		 
	$param = [
			   'name'=>$_POST['name'],
			   'userName'=>$_POST['userName'],
			   'password'=>$password,			   
			   'email'=>$_POST['email'],
			   'phone'=>$_POST['phone'],
			   'gender'=>$_POST['gender'],
			   'dob'=>$_POST['dob'],  
			   'address'=>$_POST['address'],
			   'user_roll'=>$_POST['user_roll'],
			   'create_at'=>date('d-m-Y'),
			   'status'=>$_POST['status']
       ];
	   
	    $result = $Obj->editEmployee($param,$eml);
		
		if($result){
	         header("location:employee-list.php");    
       }
  }*/
  
  $empRecode = $Obj->getRecodeByid('employee',"id='$eml'");
  $empList = $empRecode->fetch_array();
  
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
	<h1 class="h3 mb-2 text-gray-800">Update Employee</h1>
	 <h4 style="color:red;" class="error-message"></h4>
	  <div class="card shadow mb-4">
	   <div class="card-header py-3">
	    </div>
	     <div class="card-body">
          <form method="POST" name="validationForm" class="emoloyee" id="validationForm" enctype="multipart/form-data">
		   <div class="form-group">
			<input type="text" class="form-control" id="name" name="name" value="<?=$empList['name']; ?>">
		    </div>
		
		<div class="form-group">
			<input type="text" name="userName" class="form-control" id="userName" value="<?=$empList['userName']; ?>" readonly>
			<?php if(isset($msg)){echo $msg; } ?>
		</div>
		
		<div class="form-group">
			<input type="password" name="password1" class="form-control" id="password" placeholder="**********">
			<input type="hidden" name="password2" class="form-control" value="<?=$empList['password']; ?>" >
		</div>
		
		<div class="form-group">
			<input type="email" name="email" class="form-control" id="email" value="<?=$empList['email']; ?>">
		</div>
		
		<div class="form-group">
			<input type="number" name="phone" class="form-control" id="phone" value="<?=$empList['phone']; ?>">
		</div>
		
		<div class="form-group">
		  <label for="gender">Gender : </label>
			Male <input type="radio" name="gender" value="M" <?php if($empList['gender']=='M'){ echo'checked'; } ?> id="gender">
			Fimale <input type="radio" name="gender" value="F" <?php if($empList['gender']=='F'){ echo'checked'; } ?> id="gender">
		</div>
		
		<div class="form-group">
			<input type="date" name="dob" class="form-control" id="dob" value="<?=$empList['dob']; ?>">
		</div>
		
		<div class="form-group">
			<input type="text" name="address" class="form-control" id="address" value="<?=$empList['address']; ?>">
		</div>
	    
		<div class="form-group">
		<label for="User Roll" class="">User Roll</label>
			<select name="user_roll" class="form-control" id="user_roll">
			<option>--Select--</option>
			  <?php while($roll = $userRoll->fetch_array()) {  ?>
			      <option value="<?=$roll['roll_name']; ?>"<?php if($empList['user_roll']==$roll['roll_name']){ echo "selected"; }?> ><?=$roll['roll_name']; ?></option>
			<?php  }  ?>			  		 
			</select>
		      </div>

            <div class="form-group">
		<label for="User Roll" class="">Status</label>
			<select name="status" id="status">				 
			<option value="<?=$empList['status']; ?>"<?php if($empList['status']==1){ echo "selected"; }?> >Active</option>
			<option value="<?=$empList['status']; ?>"<?php if($empList['status']==0){ echo "selected"; }?> >Inactive</option>
						  		 
			</select>
		      </div>			  
	           <input type="submit" name="submit" value="Update" class="btn btn-primary mybuttan">
			   <input type="hidden" name="emp_id" value="<?=$eml;?>">
			    <h4 style="color:red;" class="error-message"></h4>
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/formValidation.js"></script>
	 <script>
	  $(document).ready(function(){
		  function message(message,statu){
			 if(statu==true){
				 /*$(".emoloyee").trigger("reset");
				$('.success-message').html(message).slideDown(); 
				$('.error-message').slideUp();
                setTimeout(function(){
				 $('.success-message').slideUp(); 				  
			  },8000);*/
			  
			   document.location.href = '<?=BASE_URL ?>employee-list.php';	  
				 
			 }
			 else if(statu==false){
				$('.error-message').html(message).slideDown(); 
				$('.success-message').slideUp();
                 setTimeout(function(){
				 $('.error-message').slideUp(); 				  
			  },4000);			
			 } 
		  }
		  
   /**************************************************form data sirializetion************************************/		  
		  function jsonData(targerForm){
			    var arr = $(targerForm).serializeArray();
                 // console.log(arr);				
			     var obj = {};
				 for(var a=0; a < arr.length; a++){
					 if(arr[a].value == ""){						 
						 return false;						 
					 }
					 
					obj[arr[a].name]= arr[a].value; 
				 }			 
				 var jsonStrin = JSON.stringify(obj);
				 return jsonStrin;				 
		        }
				
		  /************************************************pass the data to Api**********************************/
		  
		    $('.mybuttan').on('click',function(event){
		      event.preventDefault();
			    var jsonObject = jsonData('.emoloyee');
				//console.log(jsonObject);
			    
                if(jsonObject==false){
					message('All Field is required',false);
				}
               else{
				  $.ajax({
				       url : '<?=BASE_URL ?>Api/Api_update_user.php',
					   type : "POST",					
					   data :jsonObject,
					   success: function(data){
						 //console.log(data);
						 if(data.status == true){
							   message('Register Successfull',data.status);
						 } 
						 else{
							 message(data.message,data.status);
						 }
					 }
				 
		        }); 
				   
				   
			   }				
		  });
		 	  
	  });
	 
</script>
 
</body>

</html>