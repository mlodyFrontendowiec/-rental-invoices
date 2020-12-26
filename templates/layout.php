<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rachunek</title>
    <link rel="stylesheet" href="style/css/style.css">
</head>

<body>

    <div class="panel">
        <header class="panel__header">

            <h1 class="panel__title"><a class="panel__link-logo" href="/?action=userPanel">Rachunek</a></h1>
            <?php session_start(); if (isset($_SESSION['user'])): $user = $_SESSION['user']; ?>
            <div class="panel__hamburger hamburger">
                <span class="hamburger__span"></span>
                <span class="hamburger__span"></span>
                <span class="hamburger__span"></span>
            </div>
            <p class="panel__hello-user"><?php echo "Witaj! ". htmlentities($user) ?>
            </p>
        </header>
        <aside class="panel__menu">
            <nav class="panel__nav">
                <ul class="panel__links-container">
                    <li class="panel__link-container"><a class="panel__link" href="/?action=createClient">Dodaj
                            Klienta</a>
                    </li>
                    <li class="panel__link-container"><a class="panel__link" href="/?action=allClients">Klienci</a>
                    </li>
                    <li class="panel__link-container"><a class="panel__link" href="/?action=logoutUser">Wyloguj</a>
                    </li>
                </ul>
            </nav>
        </aside>
        <?php endif;?>
        <?php require_once("pages/$page.php")?>
    </div>


    <script src="/js/hamburger.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>