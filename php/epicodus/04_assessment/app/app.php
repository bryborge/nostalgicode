<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Brand.php";
    require_once __DIR__."/../src/Store.php";

    $DB = new PDO("pgsql: host=localhost; dbname=shoes; password=password");

    $app = new Silex\Application();

    $app['debug'] = TRUE;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    // MAIN ROUTES
    // get and render main
    $app->get('/', function() use ($app) {
        return $app['twig']->render('main.html.twig', array('brands' => Brand::getAll(), 'stores' => Store::getAll()));
    });

    // post a store and render main
    $app->post('/stores', function() use ($app) {
        $name  = $_POST['add_store'];
        $store = new Store($name);
        $store->save();

        return $app['twig']->render('main.html.twig', array('brands' => Brand::getAll(), 'stores' => Store::getAll()));
    });

    // delete a store and render main
    $app->delete('/stores/{id}/delete', function($id) use ($app) {
        $store = Store::findById($_POST['store_id']);
        $store->delete();

        return $app['twig']->render('main.html.twig', array('brands' =>  Brand::getAll(), 'stores' => Store::getAll()));
    });

    // post a brand and render main
    $app->post('/brands', function() use ($app) {
        $name  = $_POST['add_brand'];
        $brand = new Brand($name);
        $brand->save();

        return $app['twig']->render('main.html.twig', array('brands' => Brand::getAll(), 'stores' => Store::getAll()));
    });

    // delete a brand and render main
    $app->delete('/brands/{id}/delete', function($id) use ($app) {
        $store = Brand::findById($_POST['brand_id']);
        $store->delete();

        return $app['twig']->render('main.html.twig', array('brands' =>  Brand::getAll(), 'stores' => Store::getAll()));
    });

    // delete all database table contents and render main
    $app->delete('/system_restore', function() use ($app) {
        Brand::deleteAll();
        Store::deleteAll();

        return $app['twig']->render('main.html.twig', array('brands' => Brand::getAll(), 'stores' => Store::getAll()));
    });


    // STORE ROUTES
    // get and render individual store
    $app->get('/store/{id}', function($id) use ($app) {
        $store = Store::findById($id);

        return $app['twig']->render('store.html.twig', array('store_brands' => $store->getBrands(), 'store' => $store, 'brands' => Brand::getAll()));
    });

    // rename store and render individual store
    $app->patch('/store/{id}', function($id) use ($app) {
        $store = Store::findById($id);
        $store->update($_POST['edit_store']);

        return $app['twig']->render('store.html.twig', array('store_brands' => $store->getBrands(), 'store' => $store, 'brands' => Brand::getAll()));
    });

    // add brands to this individual store and render this individual store
    $app->post('/store/{id}/add_brand', function($id) use ($app) {
        $store = Store::findById($id);
        $brand = Brand::findById($_POST['brand_id']);
        $store->addBrand($brand);

        return $app['twig']->render('store.html.twig', array('store_brands' => $store->getBrands(), 'store' => $store, 'brands' => Brand::getAll()));
    });


    // BRAND ROUTES
    // get and render individual brand
    $app->get('/brand/{id}', function($id) use ($app) {
        $brand = Brand::findById($id);

        return $app['twig']->render('brand.html.twig', array('store_brands' => $brand->getStores(), 'brand' => $brand, 'stores' => Store::getAll()));
    });

    // rename brand and render individual brand
    $app->patch('/brand/{id}', function($id) use ($app) {
        $brand = Brand::findById($id);
        $brand->update($_POST['edit_brand']);

        return $app['twig']->render('brand.html.twig', array('store_brands' => $brand->getStores(), 'brand' => $brand, 'stores' => Store::getAll()));
    });

    // add stores to this individual brand and render this individual brand
    $app->post('/brand/{id}/add_store', function($id) use ($app) {
        $brand = Brand::findById($id);
        $store = Store::findById($_POST['store_id']);
        $brand->addStore($store);

        return $app['twig']->render('brand.html.twig', array('store_brands' => $brand->getStores(), 'brand' => $brand, 'stores' => Store::getAll()));
    });

    return $app;

?>
