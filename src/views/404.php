<?php
ob_start();
?>

<section class="error">
    <h1>Error 404</h1>
    <p>The page you are looking for does not exist! <a href="/dashboard">Leave this page!</a></p>
</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
