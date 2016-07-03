<?php
if(empty($_FILES['file']))
{
    exit();
}
$errorImgFile = "./img/img_upload_error.jpg";
$destinationFilePath = __DIR__.'/uploads/images/'.$_FILES['file']['name'];
if(!move_uploaded_file($_FILES['file']['tmp_name'], $destinationFilePath)){
    echo $errorImgFile;
}
else{
    // patq e statichen, tarsi snimkite v papka www.yoursite.com/admin/uploads
    echo 'www.yoursite.com/admin/uploads/images/'.$_FILES['file']['name'];
}

?>