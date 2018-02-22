<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/RepeatCounter.php';

    $app = new Silex\Application;
    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path'=>__DIR__.'/../views'
    ));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('home.twig');
    });

    $app->post('/results', function() use ($app) {
        $search = new RepeatCounter;
        $search_result = $search->countRepeats($_POST['search-word'], $_POST['string']);

        return $app['twig']->render('results.twig', array('search_result' => $search_result));
    });

    return $app;

?>
