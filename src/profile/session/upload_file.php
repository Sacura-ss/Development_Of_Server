<?php

session_start();

$path = 'uploads_pdf/' . time() . $_FILES['file']['name'];
echo "<script>console.group('"."path"."');console.log('".$path."');console.groupEnd();</script>";

if (!move_uploaded_file($_FILES['file']['tmp_name'], '../' . $path)) {
    $_SESSION['message'] = 'Problem uploading file ' . $_FILES['file']['name'];
    die();
}
elseif (fread(fopen($_FILES['file']['name'], "r"), 5) != '%PDF-') {
    $_SESSION['message'] = 'You can select only PDF file';
    die();
}
else {
    $redis->set(file_get_contents($_FILES['file']['name']), $_SESSION['user']);
    $_SESSION['message'] = "The file ". basename( $_FILES['file']['name']). " is uploaded";
}

?>