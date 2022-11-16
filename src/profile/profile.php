<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: index.php');
}

echo session_id();

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

$redis = new Redis();
$redis->pconnect('redis', 6379);

//$redis->set(session_id(), $_SESSION['user']);

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
    </div>

</body>
</html>