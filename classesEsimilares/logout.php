<?php

if(isset($_SESSION['Nome'])) {
    session_destroy();
    header('Location:../index.html');
    exit();
}



