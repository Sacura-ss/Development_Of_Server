<?php

ini_set('session.save_handler', 'redis');
echo '' . ini_get('session.save_handler');

//session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

$redis = new Redis();
$redis->pconnect('redis', 6379);

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

    <header>
        <div class = "name">Хочу на море</div>
        <ul class = "menu">
		    <li><a href = "../home/index.html">Домой</a></li>
        </ul>
    </header>

    <!-- Форма авторизации -->
    <div class="body">
        <form  action="session/signin.php" method="post">
            <label>Логин</label>
            <input type="text" name="login" placeholder="Введите свой логин">
            <label>Пароль</label>
            <input type="password" name="password" placeholder="Введите пароль">
            <button type="submit">Войти</button>
            <p>
                У вас нет аккаунта? - <a href="register.php">зарегистрируйтесь</a>!
            </p>
            <?php
                if ($_SESSION['message']) {
                    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                }
                unset($_SESSION['message']);
            ?>
        </form>
    </div>
</body>
</html>