<?php
	include "classes/functions.php";
	$Obj = new Employee();
	

 ?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">    
    <title>Admin Login</title>	
    <?php include('comman/comman_css.php'); ?>
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
               <div class="row">                         
               <div class="col-lg-6">
              <div class="p-5">
			<div class="text-center"><h1 class="h4 text-gray-900 mb-4">Admin Login</h1><span id="success-message"></span><span style="color:red;" id="error-message"></span></div>
			<form method="POST" name="validationForm" id="validationForm" class="emoloyee">
				<div class="form-group">
					<input type="text" class="form-control" name="userName" value="<?php if(isset($_POST['userName'])){echo $_POST['userName'];} ?>" id="userName" placeholder="Username">
				</div>
				<div class="form-group">
				 <input type="password" class="form-control" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>" id="password" placeholder="Password">
				</div>				
				   <input type="submit" id="login" value="Login" class="btn btn-primary mybuttan">			   
				<hr>				
			</form>
                    
			<div class="text-center">
				<a class="small" href="register.php">Create an Account!</a>
			</div>
           </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
      <?php include('comman/comman_js.php'); ?>
	  
	  <script>
			  $(document).ready(function(){
				  function message(message,statu){
					 if(statu==true){
						 document.location.href = '<?=BASE_URL ?>dashbord.php';
					 }
					 else if(statu==false){
						   $('#error-message').html(message).slideDown(); 
						   $('#success-message').slideUp();
					        setTimeout(function(){
						    $('#error-message').slideUp(); 				  
					  },4000);				
			 } 
		  }
		  
   /*****************************form data sirializetion************************************/		  
		  function jsonData(targerForm){
			    var arr = $(targerForm).serializeArray();              		 
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
				
    /********************************pass the data to Api**********************************/
		  
		    $('.mybuttan').on('click',function(event){
		      event.preventDefault();
			    var jsonObject = jsonData('.emoloyee');
			    
                if(jsonObject==false){
					message('UserName or Password Not Empty',false);
				}
               else{
				  $.ajax({
				       url : '<?=BASE_URL ?>Api/Api_login.php',
					   type : "POST",					
					   data :jsonObject,
					   success: function(data){
						 //console.log(data);
						 if(data.status == true){
							   message('sucess',data.status);
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