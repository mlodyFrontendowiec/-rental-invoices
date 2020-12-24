<?php
if (isset($_SESSION['acces']) && $_SESSION['acces'] === 1):?>
<div class="client__wrapper">
    <?php foreach ($data as $key => $value):?>
    <section class="client__section">
        <h1 class="client__title"><?php echo $value[1]?>
        </h1>
        <p class="client__description"><?php echo $value[2]?>
        </p>
        <a class="client__details" href=<?php echo "/?action=detailsClient&id=$value[0]"?>>Przejdź</a>
    </section>
    <?php endforeach;?>


</div>
<?php else:?>
<h1 class="panel__fail">Brak autoryzacji</h1>
<?php endif;
