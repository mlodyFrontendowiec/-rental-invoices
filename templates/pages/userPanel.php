<?php
if (isset($_SESSION['acces']) && $_SESSION['acces'] === 1):?>

<?php foreach ($data as  $bill):?>
<div class="panel__bill-wrapper">
    <h2>Rachunek</h2>
    <p><?php echo $bill[0][1] . " " .  $bill[0][2] ?>
    </p>
    <p><?php echo $bill[1][2] ?>
    </p>
    <a class="panel__bill-download"
        href="/downloadFile?user=<?php echo $bill[0][0]?>&service=<?php echo $bill[1][0]?>">Pobierz</a>
</div>






<?php endforeach?>
<?php else:?>
<h1 class=" panel__fail">Brak autoryzacji</h1>
<?php endif;
