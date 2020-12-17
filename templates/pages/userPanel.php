<?php
session_start();
dump($_SESSION);
if (isset($_SESSION['acces']) && $_SESSION['acces'] == 1):?>
<h1>zalogowano</h1>
<a href="/?action=logoutUser">Wyloguj</a>
<?php else:?>
<h1>Brak autoryzacji</h1>
<?php endif;
