<?php

session_start();

if (isset($_POST['submit'])) {
 
    $name = $_POST['name'];

    if (isset($_FILES['pdf_file']['name']))
    {
      $file_name = $_FILES['pdf_file']['name'];
      $file_tmp = $_FILES['pdf_file']['tmp_name'];

      move_uploaded_file($file_tmp,"../uploads_pdf/".$file_name);

    }
    else
    {
       ?>
        <div class=
        "alert alert-danger alert-dismissible
        fade show text-center">
          <a class="close" data-dismiss="alert"
             aria-label="close">×</a>
          <strong>Failed!</strong>
              File must be uploaded in PDF format!
        </div>
      <?php
    }
}


/*$path = 'uploads_pdf/' . time() . $_FILES['file']['name'];
echo "<script>console.group('"."path"."');console.log('".$path."');console.groupEnd();</script>";

if (!move_uploaded_file($_FILES['file']['tmp_name'], 'var/www/html/profile/' . $path)) {
    $_SESSION['message'] = 'Problem uploading file ' . $path . $_FILES['file']['name'];
    die();
}
elseif (fread(fopen($_FILES['file']['name'], "r"), 5) != '%PDF-') {
    $_SESSION['message'] = 'You can select only PDF file';
    die();
}
else {
    $redis->set(file_get_contents($_FILES['file']['name']), $_SESSION['user']);
    $_SESSION['message'] = "The file ". basename( $_FILES['file']['name']). " is uploaded";
}*/

?>