<?php
if (isset($_SESSION['acces']) && $_SESSION['acces'] === 1):?>
<form class="form__client" action="/?action=addClient" method="POST">
    <h1 class="form__title">Dodaj klienta</h1>
    <div class="form__wrapper">
        <label class="form__label">
            Imię: <input class="form__input" required name="name" type="text" />
        </label>
        <label class="form__label">
            Nazwisko: <input class="form__input" required name="surname" type="text" />
        </label>
        <labal class="form__label">
            Adres: <input class="form__input" required name="address" type="text" />
        </labal>
        <label class="form__label">
            Kod pocztowy: <input class="form__input" required name="code" type="text" />
        </label>
        <label class="form__label">
            Miasto: <input class="form__input" required name="city" type="text" />
        </label>

    </div>
    <button type="submit" class="form__submit">Dodaj</button>
</form>
<?php else:?>
<h1 class="panel__fail">Brak autoryzacji</h1>
<?php endif;
