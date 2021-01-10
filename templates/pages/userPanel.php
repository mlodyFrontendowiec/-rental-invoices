<?php
if (isset($_SESSION['acces']) && $_SESSION['acces'] === 1):?>

<?php foreach ($data as  $bill):?>

<div class="panel__bill-wrapper">
    <h2>Rachunek</h2>
    <p><?php echo $bill[0]["name"] . " " .  $bill[0]["surname"] ?>
    </p>
    <p><?php echo $bill[1]["name"] ?>
    </p>
    <a class="panel__bill-download"
        href="/?action=downloadFile&user=<?php echo $bill[0]["id"]?>&service=<?php echo $bill[1]['id']?>">Pobierz</a>
</div>






<?php endforeach?>
<?php else:?>
<h1 class=" panel__fail">Brak autoryzacji</h1>
<?php endif;
