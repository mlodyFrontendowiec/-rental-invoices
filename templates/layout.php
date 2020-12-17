<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rachunek</title>
    <link rel="stylesheet" href="style/css/style.css">
</head>

<body>
    <?php
if ($page === "login") :?>
    <?php require_once("pages/$page.php"); else:?>
    <div class="panel">
        <header class="panel__header">
            <h1 class="panel__title">Rachunek</h1>
        </header>
        <?php require_once("pages/$page.php");?>
        <?php endif;?>
    </div>
</body>

</html>