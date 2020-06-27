<?php

use Dompdf\Dompdf;
use Dompdf\Options;

require __DIR__."/vendor/autoload.php";

$dompdf = new Dompdf(["enable_remote" => true]);
$dompdf->loadHtml("<h1>Olá Mundo!</h1><p>Esse é seu primeiro PDF!</p>");

// users.php
// ob_start();
// require __DIR__."/contents/users.php";
// $dompdf->loadHtml(ob_get_clean());

// profile.php
ob_start();
require __DIR__."/contents/profile.php";
$dompdf->loadHtml(ob_get_clean());

// $dompdf->setPaper("A4", "landscape");
$dompdf->setPaper("A4");

$dompdf->render();
$dompdf->stream("file.pdf", ["Attachment" => true]);