<?php
    session_start();
    session_destroy();
    session_unset();
    header('Location: ../views'); 
    /* Or whatever document you want to show afterwards */
?>