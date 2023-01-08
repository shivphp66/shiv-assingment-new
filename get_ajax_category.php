<?php 
 include "classes/functions.php";
    $Obj = new Employee();
    if(!empty($_POST['category'])){
    $category = $_POST['category'];
	$catdata = $Obj->getAjaxCategory('category',"parent_category_id='$category'"); 	
	if($catdata->num_rows>0){				
			  while($list = $catdata->fetch_array()){				
			   echo '<option value="'.$list['category_id'].'">'.$list['category_name'].'</option>'; 
			}		
	     }
   else{ 
        echo '<option value="">Category not available</option>'; 
    } 	
}	
	 
?>   