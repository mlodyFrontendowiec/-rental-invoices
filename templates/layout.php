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
            <h1 class="panel__title"><a class="panel__link" href="/?action=userPanel">Rachunek</a></h1>
            <?php session_start(); if (isset($_SESSION['user'])): $user = $_SESSION['user']; ?>
            <p class="panel__hello-user"><?php echo "Witaj! $user"?>
            </p>
            <?php endif;?>
        </header>
        <?php require_once("pages/$page.php")?>
    </div>
</body>

</html>