<?php
    session_start();

    if(session_destroy()) {
        header('location: /work_effort');
    }
?>