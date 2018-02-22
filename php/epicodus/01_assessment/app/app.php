<?php

    // Load autoload.php and AddressBook.php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Contact.php';

    // Start Session
    session_start();

    if(empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }

    // new $app Object
    $app = new Silex\Application;

    // Point app to twig files in /views directory
    $app->register(new Silex\Provider\TwigServiceProvider(), array (
        'twig.path' => __DIR__.'/../views'
    ));

    // Set route for root path
    $app->get('/', function() use ($app) {
        return $app['twig']->render('contacts.twig', array('contacts' => Contact::getAll()));
    });

    // Post method on $app Object - stores a data object $contact into array
    $app->post('/add_contact', function() use ($app) {
        $contact = new Contact($_POST['name'], $_POST['phone'], $_POST['address'], $_POST['url_image']);
        $contact->save();

        return $app['twig']->render('add_contact.twig', array('add_new_contact' => $contact));
    });

    // Post method on $app Object - removes all data from array
    $app->post('/delete_all_contacts', function() use ($app) {
        return $app['twig']->render('delete_all_contacts.twig', array('delete_contacts' => Contact::removeAll()));
    });

    // Return $app Object
    return $app;

?>
