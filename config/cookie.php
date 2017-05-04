<?php

/**
 * Tell WordPress to save the cookie on the domain
 * @var bool
 */

<<<<<<< HEAD
define('COOKIE_DOMAIN', 'helsingborg.se');
=======
if (strpos($_SERVER['HTTP_HOST'], "skola.dev") !== false) {
    define('COOKIE_DOMAIN', ".skola.dev");
} else {
    define('COOKIE_DOMAIN', $_SERVER['HTTP_HOST']);
}
>>>>>>> parent of c586ac7... Cookie
