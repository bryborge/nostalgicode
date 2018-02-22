<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Client.php';
    require_once __DIR__.'/../src/Flag.php';
    require_once __DIR__.'/../src/IntakeStaff.php';
    require_once __DIR__.'/../src/SocialWorker.php';
    require_once __DIR__.'/../src/Med.php';
    require_once __DIR__.'/../src/Stay.php';
    require_once __DIR__.'/../src/Allergy.php';

    $DB = new PDO('pgsql:host=localhost; dbname=cms; password=password');

    $app = new Silex\Application;

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path'=>__DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
     Request::enableHttpMethodParameterOverride();

    // GET (cRud)
    $app->get('/', function() use ($app) {
        return $app['twig']->render('main.html.twig', array('results' => null));
    });

    $app->get('/dashboard', function() use ($app) {
        return $app['twig']->render('dashboard.html.twig');
    });

    $app->get('/client_edit/{id}', function($id) use ($app) {
        $client = Client::find($id);
        $flags = $client->getFlags();
        $stay = $client->getCurrentStay();
        $staffs = $stay->getIntakeStaff();
        $workers = $stay->getSocialWorkers();
        $meds = $stay->getMeds();
        $allergies = $client->getAllergies();
        return $app['twig']->render('client_edit.html.twig', array('client' => $client, 'flags' => $flags, 'stay' => $stay, 'staffs' => $staffs, 'workers' => $workers, 'meds' => $meds, 'allergies' => $allergies));
    });

    $app->get('/add_new_client', function() use ($app) {

        return $app['twig']->render('add_client.html.twig', array('flags' => Flag::getAll(), 'allergies' => Allergy::getAll(), 'added' => false));
    });

    $app->post('/add_new_client', function() use ($app){
        $new_client = new Client(
            $_POST['last_name'],
            $_POST['first_name'],
            $_POST['alias'],
            $_POST['dob'],
            $_POST['gender'],
            $_POST['race'],
            $_POST['ethnicity'],
            $_POST['notes'],
            $_POST['admit_status'],
            $_POST['last_assessed']
        );

        $new_client->save();

        //add drop down and join
        $new_flag = new Flag(
            $_POST['flag_type']
        );

        $client_id = $new_client->getId();

        $new_client->addFlag($new_flag);

    //add join for allergy
        // $new_allergy = new Allergy(
        //     $_POST['allergies']
        // );
        //
        // $new_allergies->save();
    //MUST ADD addAllergy() method to Allergy class
        //$new_client->addAllergy($new_allergy);

        return $app['twig']->render('add_client.html.twig', array('flags' => Flag::getAll(), 'allergies' => Allergy::getAll(), 'added' => true, 'client' => $new_client));
    });

    $app->post('/add_client_stay/{id}', function($id) use ($app) {
        $client = Client::find($id);

        return $app['twig']->render('add_client_stay.html.twig', array('client' => $client, 'social_workers' => SocialWorker::getAll(), 'intake_staff' => IntakeStaff::getAll()));
    });

    $app->post('/new_stay/{id}', function($id) use ($app) {
        $client = Client::find($id);

        $intake_staff = new IntakeStaff($_POST['intake-staff']);
        $social_worker = new SocialWorker($_POST['social-worker']);
        $intake_date_time = $_POST['intake-date'] . " " . $_POST['intake-time'];
        $stay = new Stay($intake_date_time, null, $_POST['run-risk'], null, $_POST['lice'], null);
        $stay->saveNewIntake();
        $stay->addIntakeStaff($intake_staff);
        $stay->addSocialWorker($social_worker);
        $client->addStay($stay);


        return $app['twig']->render('dashboard.html.twig');
    });

    $app->get('/dashboard/{id}', function() use ($app) {
        return $app['twig']->render('dashboard.html.twig');
    });

    $app->get('/dashboard/{id}/client_meds_edit', function() use ($app) {
        return $app['twig']->render('client_meds_edit.html.twig');
    });

    $app->get('/dashboard/{id}/client_allergies', function() use ($app) {
        return $app['twig']->render('allergies.html.twig');
    });

    // Admin drop-down
    $app->post('/admin_meds_edit', function() use ($app) {
        $new_med = new Med(
          $_POST['med_name'],
          $_POST['med_dose'],
          $_POST['med_time'],
          $_POST['notes']
        );
        $new_med->save();

        return $app['twig']->render('meds_edit.html.twig', array('meds' => Med::getAll()));
    });

    $app->get('/admin_meds_edit', function() use ($app) {
        return $app['twig']->render('meds_edit.html.twig', array('meds' => Med::getAll()));
    });

    $app->delete("/admin_meds_edit/{id}", function($id) use ($app) {
       $delete_med = Med::find($id);
       $delete_med->delete();
       return $app['twig']->render('meds_edit.html.twig', array('meds' => Med::getAll()));
     });

    $app->get('/admin_flags_edit', function() use ($app) {
        return $app['twig']->render('flags_edit.html.twig', array('flags' => Flag::getAll()));
    });

/////////////////////
    $app->post('/admin_flags_edit', function() use ($app) {
        $new_flag = new Flag(
            $_POST['new-flag']
        );

        $new_flag->save();

        return $app['twig']->render('flags_edit.html.twig', array('flags' => Flag::getAll()));
    });

    $app->post('/admin_flags_edit/{id}', function($id) use ($app) {
        $new_flag = new Flag(
            $_POST['new-flag']
        );

        $new_flag->save();

        return $app['twig']->render('flags_edit.html.twig', array('flags' => Flag::getAll()));
    });

    $app->delete('/admin_flags_edit/{id}', function($id) use ($app) {
        $flag = Flag::find($id);
        $flag->delete();
        return $app['twig']->render('flags_edit.html.twig', array('flag' => $flag, 'flags' => Flag::getAll()));
    });

    $app->get('/admin_flags_edit/{id}', function($id) use ($app) {
        return $app['twig']->render('flags_edit.html.twig', array('flags' => Flag::getAll()));
    });
/////////////////////

    $app->delete('/admin_staff_edit/{id}', function($id) use ($app) {
        $staff = IntakeStaff::find($id);
        $staff->delete();

        return $app['twig']->render('staff_edit.html.twig', array('staff' => $staff, 'staffs' => IntakeStaff::getAll()));
    });

    $app->get('/admin_staff_edit/{id}', function($id) use ($app) {
        return $app['twig']->render('staff_edit.html.twig', array('staffs' => IntakeStaff::getAll()));
    });

    $app->get('/admin_staff_edit', function() use ($app) {
        return $app['twig']->render('staff_edit.html.twig', array('staffs' => IntakeStaff::getAll()));
    });

    $app->post('/admin_staff_edit', function() use ($app) {
        $staff = new IntakeStaff($_POST['new-staff']);
        $staff->save();

        return $app['twig']->render('staff_edit.html.twig', array('staff' => $staff, 'staffs' => IntakeStaff::getAll()));
    });

    $app->get('/docs', function() use ($app) {
        return $app['twig']->render('documentation.html.twig');
    });

    $app->get('/credits', function() use ($app) {
        return $app['twig']->render('credits.html.twig');
    });


    // POST (Crud)
    $app->post('/', function() use ($app) {
        return $app['twig']->render('main.html.twig', array('results' => Client::getAll()));
    });

    $app->post('/search', function() use ($app) {
        $results = "empty";
        $search_term = $_POST['search-field'];
        if (!empty($search_term)) {
            $results = Client::search($search_term);
            $results = empty($results) ? "empty" : $results;
        }
        return $app['twig']->render('main.html.twig', array('results' => $results));
    });

    $app->post('/dashboard/{id}/client_exit', function() use ($app) {
        return $app['twig']->render('client_exit.html.twig', array('exited' => false));
    });

    $app->post('/dashboard/id/client_exited', function() use ($app) {


        return $app['twig']->render('client_exit.html.twig', array('exited' => true));
    });

    $app->post('/add_new_client', function() use ($app) {
        return $app['twig']->render('add_client.html.twig');
    });

    $app->post('/add_client_stay', function() use ($app) {
        return $app['twig']->render('add_client_stay.html.twig');
    });

    $app->post('/dashboard', function() use ($app) {
        return $app['twig']->render('dashboard.html.twig');
    });


    // PATCH (crUd)

    $app->patch('/edit/{id}', function($id) use ($app) {
        $client = Client::find($id);
        $stay = $client->getCurrentStay();
        if (!empty($_POST['first-name'])) {
            $client->updateFirstName($_POST['first-name']);
        }
        if (!empty($_POST['last-name'])) {
            $client->updateLastName($_POST['last-name']);
        }
        if (!empty($_POST['alias'])) {
            $client->updateAlias($_POST['alias']);
        }
        if (!empty($_POST['dob'])) {
            $client->updateDob($_POST['dob']);
        }
        if (!empty($_POST['gender'])) {
            $client->updateGender($_POST['gender']);
        }
        if (!empty($_POST['race'])) {
            $client->updateRace($_POST['race']);
        }
        if (!empty($_POST['admit-status'])) {
            $client->updateAdmitStatus($_POST['admit-status']);
        }
        if (!empty($_POST['last-assessed'])) {
            $client->updateLastAssessed($_POST['last-assessed']);
        }
        if (!empty($_POST['flag-type'])) {
            $flag = new Flag($_POST['flag-type']);
            $client->addFlag($flag);
        }
        if (!empty($_POST['social-worker'])) {
            $social_worker = new SocialWorker($_POST['social-worker']);
            $social_worker->save();
            $stay->addSocialWorker($social_worker);
        }
        if (!empty($_POST['intake-staff'])) {
            $intake_staff = new IntakeStaff($_POST['intake-staff']);
            $intake_staff->save();
            $stay->addIntakeStaff($intake_staff);
        }
        if (!empty($_POST['intake-date'])) {
            $intake = $_POST['intake-date'] . " " . $_POST['intake-time'];
            $stay->update(['intake_date_time' => $intake]);
        }
        if (!empty($_POST['run-risk'])) {
            $stay->update(['run_risk' => $_POST['run-risk']]);
        }
        if (!empty($_POST['lice'])) {
            $lice = $_POST['lice'] == "yes" ? 1 : 0;
            $stay->update(['lice' => $lice]);
        }
        // still need to add medications and allergies


        $flags = $client->getFlags();

        $staffs = $stay->getIntakeStaff();
        $workers = $stay->getSocialWorkers();
        $meds = $stay->getMeds();
        $allergies = $client->getAllergies();
        return $app['twig']->render('client_edit.html.twig', array('client' => $client, 'flags' => $flags, 'stay' => $stay, 'staffs' => $staffs, 'workers' => $workers, 'meds' => $meds, 'allergies' => $allergies));
    });


    // DELETE (cruD)



    return $app;

?>
