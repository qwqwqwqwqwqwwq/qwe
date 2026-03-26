<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
    <h2>Форма регистрации</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fullname = htmlspecialchars($_POST['fullname']);
        $username = htmlspecialchars($_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $birthdate = $_POST['birthdate'];

        echo "<h3>Данные пользователя:</h3>";
        echo "ФИО: $fullname<br>";
        echo "Логин: $username<br>";
        echo "Пароль (хэш): $password<br>";
        echo "Дата рождения: $birthdate<br>";
    } else {
    ?>

    <form method="post">
        <label>ФИО: <input type="text" name="fullname" required></label><br><br>
        <label>Логин: <input type="text" name="username" required></label><br><br>
        <label>Пароль: <input type="password" name="password" required></label><br><br>
        <label>Дата рождения: <input type="date" name="birthdate" required></label><br><br>
        <button type="submit">Зарегистрироваться</button>
    </form>

    <?php } ?>
</body>
</html>
