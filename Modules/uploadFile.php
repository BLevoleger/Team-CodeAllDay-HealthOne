
<?php
if(isset($_POST['verzenden'])){
    print_r($_FILES);
}

$message=""; 
if (isset($_POST['verzenden'])) 
{ $result=fileupload(); 
    if($result===true) {
        echo "Image bewaard!"; 
    } else { 
        echo "Image niet bewaard op de server."; 
        echo $message; 
    } 
}

function fileupload():bool 
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
    $target_dir= "../upload/"; 
    $target_file= $_FILES['userfile']['name']; 
    do { $target_file=$target_dir.md5($target_file).".$ext"; 
    } 
    while (file_exists($target_file)); 
    //move uploaded file 
    if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target_file)) { 
        $message.="Upload gelukt, bestandsnaam is ".$target_file; 
        return true; 
    } else { 
        $message.="Sorry, upload niet gelukt";
         return false;
    } 
}


?>
