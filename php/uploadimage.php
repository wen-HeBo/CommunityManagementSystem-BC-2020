<?php 
		$filename = $_FILES['upload_file']['name'];
	    $tmp_name = $_FILES['upload_file']['tmp_name'];
	    //print_r($filename.$tmp_name.$_POST['photo']);
	    if(!file_exists($_FILES['upload_file']['name'])) 
	    	move_uploaded_file($tmp_name,"../images/".$filename);
	    

	    $path = "../images/".$filename;
			    
	    // print_r($path.$tmp_name);
	    echo json_encode(array("path"=>$path));
 ?>