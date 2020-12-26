<?php if (isset($_SESSION['acces']) && $_SESSION['acces'] === 1):?>
<?php if (!$data):?>
<h1 class="client__info">Brak klientów</h1>
<?php endif;?>
<?php foreach ($data as  $user):  ?>
<section class="client">
    <h1 class="client__title"><?php echo  $user['name'] . " " . $user['surname']?>
    </h1>
    <h2 class="client__address">Adres: <?php echo  $user['address'] . ", " . $user['code'] . ", " . $user['city']?>
    </h2>
    <div class="client__address-wrapper">
        <a class="client__delete"
            href="/?action=deleteUser&id=<?php echo $user['id']?>">Usuń
            Klienta</a>
        <a class="client__edit"
            href="/?action=editClient&id=<?php echo $user['id']?>">Edytuj
            klienta</a>
    </div>
</section>
<?php endforeach;?>
<?php else:?>
<h1 class="panel__fail">Brak autoryzacji</h1>
<?php endif;
