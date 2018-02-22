<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Client.php";
    require_once __DIR__."/../src/Stylist.php";

    $app = new Silex\Application();

    $app['debug'] = TRUE;

    $DB = new PDO('pgsql:host=localhost; dbname=hair_salon; password=password');

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get("/", function() use ($app){
        return $app['twig']->render('index.html.twig', array('stylists'=>Stylist::getAll()));
    });

    $app->post("/stylists", function() use ($app) {
        $stylist = new Stylist($id = null, $_POST['name']);
        $stylist->save();
        return $app['twig']->render('index.html.twig', array('stylist' => $stylist, 'clients' => Client::getAll(), 'stylists' => Stylist::getAll()));
    });

    $app->get("/stylists/{id}", function($id) use ($app) {
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylists.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    $app->post("/clients", function() use ($app) {
        $name = $_POST['name'];
        $stylist_id = $_POST['stylist_id'];
        $client = new Client($id = null, $name, $stylist_id);
        $client->save();
        $stylist = Stylist::find($stylist_id);
        return $app['twig']->render('stylists.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    $app->get("/stylists/{id}/edit", function($id) use ($app){
        $stylist = Stylist::find($id);
        return $app['twig']->render('stylists_edit.html.twig', array('stylist' => $stylist));
    });

    $app->patch("/stylists/{id}", function($id) use ($app) {
        $name = $_POST['name'];
        $stylist = Stylist::find($id);
        $stylist->update($name);
        $clients = Client::getAll();
        return $app['twig']->render('stylists.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    $app->delete("/stylists/{id}", function($id) use ($app) {
        $stylist = Stylist::find($id);
        $stylist->delete();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->delete("/", function() use ($app) {
        $stylists = Stylist::deleteAll();
        $clients = Client::deleteAll();
        return $app['twig']->render('index.html.twig', array('stylists' => $stylists, 'clients' => $clients));
    });

    $app->delete("/clients", function() use ($app) {
        $stylist_id = $_POST['stylist_id'];
        $stylists = Stylist::getAll();
        $that_stylist = null;
        foreach ($stylists as $stylist) {
            if ($stylist->getId() == $stylist_id) {
                $that_stylist = $stylist;
            }
        }
        $that_stylist->deleteClients();
        $stylist = Stylist::find($stylist_id);
         return $app['twig']->render('stylists.html.twig', array('stylist_id' => $stylist_id, 'stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    return $app;

?>
