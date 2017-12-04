<?php

    if(in_array($_SERVER['HTTP_HOST'], array("skola.helsingborg.se"))) {
        include __DIR__ . '/splash.html';
        exit;
    }
