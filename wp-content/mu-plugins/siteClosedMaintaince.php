<?php

    if (strpos($_SERVER['REQUEST_URI'], "wp-admin") === false) {
        if (!isset($_GET['test'])) {
            if (in_array($_SERVER['HTTP_HOST'], array("skola.helsingborg.se", "ronnowskaskolan.helsingborg.se"))) {
                include __DIR__ . '/splash.html';
                exit;
            }
        }
    }
