<?php
  reset($_FILES);
$temp = current($_FILES);

if(is_uploaded_file($temp['tmp_name']))
{
    if(preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])){
        header("HTTP/1.1 400 Invalid file name,Bad request");
        return;
    }
  
    // Validating Image file type by extensions
    if(!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))){
        header("HTTP/1.1 400 Invalid extension,Bad request");
        return;
    }
    
    $fileName = "uploads/" . $temp['name'];
    move_uploaded_file($temp['tmp_name'], $fileName);
  
    echo json_encode(array('file_path' => $fileName));
}
?>
