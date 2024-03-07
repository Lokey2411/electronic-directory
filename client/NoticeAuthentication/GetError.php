<?php
// get the error message
if (isset($_GET['error'])) {
    echo "<div class='bg-danger rounded-2 text-white font-bold p-2'>{$_GET['error']}</div>";
}
if (isset($_GET['message'])) {
    echo "<div class='bg-green-600 text-white font-bold p-2'>{$_GET['message']}</div>";
}