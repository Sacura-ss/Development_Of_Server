<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: profile.php');
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

    <!-- Форма регистрации -->
    <div class="body">
        <!--enctype - позволяет передавать файлы через форму-->
        <form action="session/signup.php" method="post" enctype="multipart/form-data">
            <label>ФИО</label>
            <input type="text" name="full_name" placeholder="Введите свое полное имя">
            <label>Логин</label>
            <input type="text" name="login" placeholder="Введите свой логин">
            <label>Почта</label>
            <input type="email" name="email" placeholder="Введите адрес своей почты">
            <label>Изображение профиля</label>
            <input type="file" name="avatar">
            <label>Пароль</label>
            <input type="password" name="password" placeholder="Введите пароль">
            <label>Подтверждение пароля</label>
            <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
            <button type="submit">Зарегистрироваться</button>
            <p>
                У вас уже есть аккаунт? - <a href="index.php">авторизируйтесь</a>!
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