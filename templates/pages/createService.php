<?php
if (isset($_SESSION['acces']) && $_SESSION['acces'] === 1):?>
<form class="form__client" action="/?action=createService" method="POST">
    <h1 class="form__title">Dodaj usługę</h1>
    <div class="form__wrapper">
        <label class="form__label">
            Symbol: <input class="form__input" required name="sign" type="text" />
        </label>
        <label class="form__label">
            Nazwa: <input class="form__input" required name="name" type="text" />
        </label>
        <labal class="form__label">
            Jednostka miary: <input class="form__input" required name="unit" type="text" />
        </labal>
        <label class="form__label">
            Cena sprzedaży: <input class="form__input" required name="price" type="text" />
        </label>

    </div>
    <button type="submit" class="form__submit">Dodaj</button>
</form>
<?php else:?>
<h1 class="panel__fail">Brak autoryzacji</h1>
<?php endif;
