<?php
require_once('Controllers/Page.php');

if (isset($_GET['url'])) {
    $file = $_GET['url'];
} else {
    $file = 'mulan';
}

$title = '';
if (isset($_GET['url'])) {
    $title = $file === 'jenis_kegiatan' ? 'JENIS KEGIATAN' : strtoupper($file);
}

$home = new Page("$title", "$file");
$home->call();