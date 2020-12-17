<?php
if (isset($_SESSION['acces']) && $_SESSION['acces'] === 1):?>

<a href="/?action=logoutUser">Wyloguj</a>
<?php else:?>
<h1>Brak autoryzacji</h1>
<?php endif;
