<?php
$countfiles = count($_FILES['files']['name']);
$upload_location = "uploads/";
$files_arr = array();
for($index = 0;$index < $countfiles;$index++){
	$filename = $_FILES['files']['name'][$index];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $valid_ext = array("png","jpeg","jpg");
    if(in_array($ext, $valid_ext)){
		date_default_timezone_set("Asia/Baghdad");
		$upload_date = date('Y_m_d&h_i_s_A');
		$new_file_name = $index.'_'.$upload_date.'.'.$ext;
    	$path = $upload_location.$new_file_name;
		if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
			$files_arr[] = $path;
		}
    }  	
}
echo json_encode($files_arr);
die;