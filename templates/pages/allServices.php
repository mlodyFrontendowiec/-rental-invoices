<?php if (isset($_SESSION['acces']) && $_SESSION['acces'] === 1):?>
<?php if (!$data):?>
<h1 class="client__info">Brak Usług</h1>
<?php endif;?>
<?php foreach ($data as  $service):  ?>
<section class="client">

    <h1 class="client__title"><?php echo  $service['name']?>
    </h1>
    <h1 class="client__address">Symbol:<?php echo  $service['sign']?>
    </h1>
    <h2 class="client__address">Jednostka: <?php echo  $service['unit']?>
    </h2>
    <h2 class="client__address">Cena: <?php echo  $service['price']?> zł
    </h2>
    <div class="client__address-wrapper">
        <a class="client__delete"
            href="/?action=deleteService&id=<?php echo $service['id']?>">Usuń
            Usługę</a>
        <a class="client__edit"
            href="/?action=editService&id=<?php echo $service['id']?>">Edytuj
            Usługę</a>
    </div>
</section>
<?php endforeach;?>
<?php else:?>
<h1 class="panel__fail">Brak autoryzacji</h1>
<?php endif;
