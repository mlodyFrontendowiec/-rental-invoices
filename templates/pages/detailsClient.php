<?php if (isset($_SESSION['acces']) && $_SESSION['acces'] === 1):?>
<section class="details">
    <h1 class="details__title"><?php echo $data["name"]?>
    </h1>
    <h2 class="details__flat">Mieszkanie:<?php echo $data["flat"]?>
    </h2>
    <h2 class="details__price">Opłata:<?php echo $data["price"]?> zł
    </h2>


</section>
<?php else:?>
<h1 class="panel__fail">Brak autoryzacji</h1>
<?php endif;
