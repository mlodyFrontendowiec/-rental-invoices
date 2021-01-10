<?php
if (isset($_SESSION['acces']) && $_SESSION['acces'] === 1):?>
<form class="form__client"
    action="/?action=editService&id=<?php echo $data['id']?>"
    method="POST">
    <h1 class="form__title">Edytuj Usługę</h1>
    <div class="form__wrapper">
        <label class="form__label">
            Nazwa: <input class="form__input" required name="name" type="text"
                value='<?php echo $data['name']?>' />
        </label>
        <label class="form__label">
            Symbol: <input class="form__input" required name="sign" type="text"
                value='<?php echo $data['sign']?>' />
        </label>
        <label class="form__label">
            Jednostka: <input class="form__input" required name="unit" type="text"
                value='<?php echo $data['unit']?>' />
        </label>
        <label class="form__label">
            Cena: <input class="form__input" required name="price" type="text"
                value='<?php echo $data['price']?>' />
        </label>
    </div>
    <button type="submit" class="form__submit">Edytuj</button>
</form>
<?php else:?>
<h1 class="panel__fail">Brak autoryzacji</h1>
<?php endif;
