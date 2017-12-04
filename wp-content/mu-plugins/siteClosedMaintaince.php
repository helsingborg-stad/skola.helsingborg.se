<?php

    if (!isset($_GET['test'])) {
        if(in_array($_SERVER['HTTP_HOST'], array("skola.helsingborg.se"))) {
            include __DIR__ . '/splash.html';
            exit;
        }
    }
