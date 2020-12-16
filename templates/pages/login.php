<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="login__wrapper">
        <h1 class="login__header">Logowanie</h1>
        <form class="login__form" action="/?action=validateLogin" method="POST">
            <label class="login__label">
                Login:<input class="login__input" type="text" name="login" placeholder="login" />
            </label>
            <label class="login__label">
                Hasło: <input class="login__input" type="password" name="password" placeholder="hasło" />
            </label>
            <button class="login__submit">Zaloguj</button>
        </form>
    </div>
</body>

</html>