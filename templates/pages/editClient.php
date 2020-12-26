<?php
if (isset($_SESSION['acces']) && $_SESSION['acces'] === 1):?>
<form class="form__client"
    action="/?action=editClient&id=<?php echo $data['id']?>"
    method="POST">
    <h1 class="form__title">Edytuj klienta</h1>
    <div class="form__wrapper">
        <label class="form__label">
            Imię: <input class="form__input" required name="name" type="text" value=<?php echo $data['name']?> />
        </label>
        <label class="form__label">
            Nazwisko: <input class="form__input" required name="surname" type="text" value=<?php echo $data['surname']?> />
        </label>
        <labal class="form__label">
            Adres: <input class="form__input" required name="address" type="text" value=<?php echo $data['address']?>/>
        </labal>
        <label class="form__label">
            Kod pocztowy: <input class="form__input" required name="code" type="text" value=<?php echo $data['code']?> />
        </label>
        <label class="form__label">
            Miasto: <input class="form__input" required name="city" type="text" value=<?php echo $data['city']?> />
        </label>
        <button type="submit" class="form__submit">Edytuj</button>
    </div>
</form>
<?php else:?>
<h1 class="panel__fail">Brak autoryzacji</h1>
<?php endif;
