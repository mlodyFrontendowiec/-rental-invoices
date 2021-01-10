<?php
if (isset($_SESSION['acces']) && $_SESSION['acces'] === 1):?>
<?php $clients  = $data['clients']; $services = $data['services']?>
<?php dump($services[0])?>
<form class="form__client" action="/?action=createBill" method="POST">
    <h1 class="form__title">Stwórz Rachunek</h1>
    <div class="form__wrapper">
        <label class="form__label">
            Odbiorca: <select name="recipient" class="form__select-client">
                <?php foreach ($clients as $client):?>
                <option value=<?php echo($client['id'])?>><?php echo $client['name'] . " ". $client['surname'] ?>
                </option>
                <?php endforeach;?>
            </select>
        </label>
        <label class="form__label">
            Usługa: <select name="service" class="form__select-service">
                <?php foreach ($services as $service):?>

                <option value=<?php echo($service['id'])?>><?php echo $service['name']?>
                </option>

                <?php endforeach;?>
            </select>
        </label>
    </div>

    <button type="submit" class="form__submit">Stwórz</button>
</form>
<?php else:?>
<h1 class="panel__fail">Brak autoryzacji</h1>
<?php endif;
