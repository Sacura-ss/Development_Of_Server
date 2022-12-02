<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: index.php');
}

//$redis->set(session_id(), $_SESSION['user']);
echo '<b>Идентификатор сессии </b><br>'.session_id();

echo '<pre><br><b>Файлы сессии</b><br>';
print_r($_SESSION);
echo '</pre><br>';

$redis = new Redis();
$redis->pconnect('redis', 6379);

echo '<b>База данных Redis</b><br>';
//Get list of all keys. This creates an array of keys from the redis-cli output of "KEYS *"
$list = $redis->keys("*");
//Optional: Sort Keys alphabetically
sort($list);
foreach ($list as $key)
{
	//Get Value of Key from Redis
	$value = $redis->get($key);
	//Print Key/value Pairs
	echo "<b>Key:</b> $key <br /><b>Value:</b> $value <br /><br />";
}

if (isset($_POST['submit'])) {
 
    $name = $_POST['name'];

    if (isset($_FILES['pdf_file']['name']))
    {
      $file_name = $_FILES['pdf_file']['name'];
      $file_tmp = $_FILES['pdf_file']['tmp_name'];

      move_uploaded_file($file_tmp,"./uploads_pdf/".$file_name);

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
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <!-- Профиль -->
    <header>
        <div class = "name">Хочу на море</div>
        <ul class = "menu">
		    <li><a href = "../home/index.html">Домой</a></li>
        </ul>
    </header>

    <div class="body">
        <form>
            <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
            <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
            <a href="#"><?= $_SESSION['user']['email'] ?></a>
            <a href="session/logout.php" class="logout">Выход</a>
        </form>
        <!--<form action="session/upload_file.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" size="50" />
            <br />
            <input type="submit" value="Upload" />
        </form>-->
        <br>
        <form method="post" enctype="multipart/form-data">
            <div class="form-input py-2">
                <div class="form-group">
                <input type="text" class="form-control" name="name"
                        placeholder="Enter your name" required>
                </div>                                 
                <div class="form-group">
                <input type="file" name="pdf_file"
                        class="form-control" accept=".pdf"
                        title="Upload PDF"/>
                </div>
                <div class="form-group">
                <input type="submit" class="btnRegister"
                        name="submit" value="Submit">
                </div>
            </div>
        </form>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </div>

</body>
</html>