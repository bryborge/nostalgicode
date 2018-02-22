<?php

    // Store path to app.php in variable $website and call run on it
    $website = require_once __DIR__.'/../app/app.php';
    $website->run();

?>
