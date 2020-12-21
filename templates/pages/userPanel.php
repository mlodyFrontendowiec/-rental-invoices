<div class="client__wrapper">
    <?php
if (isset($_SESSION['acces']) && $_SESSION['acces'] === 1):?>
    <?php foreach ($data as $key => $value):?>
    <section class="client__section">
        <h1 class="client__title"><?php echo $value[1]?>
        </h1>
        <p class="client__description"><?php echo $value[2]?>
        </p>
        <p class="client__price"><?php echo $value[3] . "zł"?>
        </p>
    </section>
    <?php endforeach;?>

    <?php else:?>
    <h1 class="panel__fail">Brak autoryzacji</h1>
    <?php endif;?>
</div>