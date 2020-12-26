<?php
if (isset($_SESSION['acces']) && $_SESSION['acces'] === 1):?>
<?php echo "Zalogowano"?>
<?php else:?>
<h1 class="panel__fail">Brak autoryzacji</h1>
<?php endif;
