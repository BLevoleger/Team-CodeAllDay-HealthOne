
<?php


function fileupload()
{ 
    global $message; 
    //check file extension 
    $allowed=['gif','png','jpg']; 
    $filename=$_FILES['userfile']['name'];
    //original filename 
    $ext=pathinfo($filename,PATHINFO_EXTENSION); 
    if (!in_array($ext,$allowed) || exif_imagetype($_FILES['userfile']['tmp_name'])===false) {
        $message="Sorry alleen gif,png of jpg files toegestaan"; 
        return false; 
    }   //rename file to unique name 
    $target_dir= "../public/img/uploads/"; 
    $target_file= $_FILES['userfile']['name']; 
    do { $target_file=md5($target_file).".$ext"; 
    } 
    while (file_exists($target_dir.$target_file)); 
    //move uploaded file 
    if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target_dir.$target_file)) { 
        $message.="Upload gelukt, bestandsnaam is ".$target_file; 
        return "/img/uploads/$target_file"; 
    } else { 
        $message.="Sorry, upload niet gelukt";
         return false;
    } 
}


?>
