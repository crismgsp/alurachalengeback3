<?php

function logout() {
    unset($_SESSION['Nome']);
    session_destroy();
}

logout();
header('Location:../index.html');
die();


/*if(isset($_SESSION['Nome'])) {
    unset($_SESSION['Nome']);
    header('Location:../index.html');
    
    exit();
} */



