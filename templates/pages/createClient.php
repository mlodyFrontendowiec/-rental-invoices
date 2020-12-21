<?php
if (isset($_SESSION['acces']) && $_SESSION['acces'] === 1):?>
<form class="form__client" action="/?action=addUser" method="POST">
    <h1 class="form__title">Dodaj klienta</h1>
    <div class="form__wrapper">
        <label class="form__label">
            Podaj nazwę: <input class="form__input" required name="name" type="text" />
        </label>
        <labal class="form__label">
            Dodaje opłatę: <input class="form__input" required name="value" type="number" />
        </labal>
        <label class="form__label">
            Podaj mieszkanie: <input class="form__input" required name="flat" type="text" />
        </label>
        <button type="submit" class="form__submit">Dodaj</button>
    </div>
</form>
<?php else:?>
<h1 class="panel__fail">Brak autoryzacji</h1>
<?php endif;
