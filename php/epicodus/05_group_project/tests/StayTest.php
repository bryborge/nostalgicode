<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Stay.php';
    require_once 'src/IntakeStaff.php';
    require_once 'src/Med.php';
    require_once 'src/SocialWorker.php';

    $DB = new PDO('pgsql:host=localhost;dbname=cms_test');

    Class StayTest extends PHPUnit_Framework_TestCase {

        protected function tearDown() {
           Stay::deleteAll();
           IntakeStaff::deleteAll();
        //    Med::deleteAll();
           SocialWorker::deleteAll();
       }

        //---------------GETTERS-TESTS--------------------

        function test_getIntakeDateTime() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            //Act
            $result = $test_stay->getIntakeDateTime();

            //Assert
            $this->assertEquals($intake_date_time, $result);
        }

        function test_getExitDateTime() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            //Act
            $result = $test_stay->getExitDateTime();

            //Assert
            $this->assertEquals($exit_date_time, $result);
        }

        function test_getRunRisk() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            //Act
            $result = $test_stay->getRunRisk();

            //Assert
            $this->assertEquals($run_risk, $result);
        }

        function test_getExitedBy() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            //Act
            $result = $test_stay->getExitedBy();

            //Assert
            $this->assertEquals($exited_by, $result);
        }

        function test_getLice() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            //Act
            $result = $test_stay->getLice();

            //Assert
            $this->assertEquals($lice, $result);
        }

        function test_getDestination() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            //Act
            $result = $test_stay->getDestination();

            //Assert
            $this->assertEquals($destination, $result);
        }

        function test_getId() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination, 2);

            //Act
            $result = $test_stay->getId();

            //Assert
            $this->assertEquals(2, $result);
        }

        //-----------------SETTERS-TESTS----------------------

        function test_setIntakeDateTime() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            //Act
            $intake_date_time2 = "2015-12-08 04:05:06";
            $test_stay->setIntakeDateTime($intake_date_time2);
            $result = $test_stay->getIntakeDateTIme();

            //Assert
            $this->assertEquals($intake_date_time2, $result);
        }

        function test_setExitDateTime() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            //Act
            $exit_date_time2 = "2015-12-08 04:05:06";
            $test_stay->setExitDateTime($exit_date_time2);
            $result = $test_stay->getExitDateTIme();

            //Assert
            $this->assertEquals($exit_date_time2, $result);
        }

        function test_setRunRisk() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            //Act
            $run_risk2 = 0;
            $test_stay->setRunRisk($run_risk2);
            $result = $test_stay->getRunRisk();

            //Assert
            $this->assertEquals($run_risk2, $result);
        }

        function test_setExitedBy() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            //Act
            $exited_by2 = "Father";
            $test_stay->setExitedBy($exited_by2);
            $result = $test_stay->getExitedBy();

            //Assert
            $this->assertEquals($exited_by2, $result);
        }

        function test_setLice() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            //Act
            $lice2 = 1;
            $test_stay->setLice($lice2);
            $result = $test_stay->getLice();

            //Assert
            $this->assertEquals($lice2, $result);
        }

        function test_setDestination() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            //Act
            $destination2 = "Hospital";
            $test_stay->setDestination($destination2);
            $result = $test_stay->getDestination();

            //Assert
            $this->assertEquals($destination2, $result);
        }

        function test_setId() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination, 10);

            //Act
            $test_stay->setId(11);
            $result = $test_stay->getId();

            //Assert
            $this->assertEquals(11, $result);
        }

        //--------------------DB-TESTS------------------------

        function test_save() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            // Act
            $test_stay->save();
            $result = Stay::getAll();

            // Assert
            $this->assertEquals([$test_stay], $result);
        }

        function test_getAll() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            $intake_date_time2 = "2013-01-08 04:05:06";
            $exit_date_time2 = "2014-01-08 04:05:06";
            $run_risk2 = 0;
            $exited_by2 = "Father";
            $lice2 = 1;
            $destination2 = 'Hospital';
            $test_stay2 = new Stay($intake_date_time2, $exit_date_time2, $run_risk2, $exited_by2, $lice2, $destination2);

            // Act
            $test_stay->save();
            $test_stay2->save();
            $result = Stay::getAll();

            // Assert
            $this->assertEquals([$test_stay, $test_stay2], $result);
        }

        function test_deleteAll() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            // Act
            $test_stay->save();
            Stay::deleteAll();
            $result = Stay::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

        function test_deleteSingleInstance() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            // Act
            $test_stay->save();
            $test_stay->delete();
            $result = Stay::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

        function test_addAndGetIntakeStaff() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            $name = "Pimby Wimbledon";
            $test_intake_staff = new IntakeStaff($name);

            // Act
            $test_stay->save();
            $test_intake_staff->save();
            $test_stay->addIntakeStaff($test_intake_staff);
            $result = $test_stay->getIntakeStaff();

            // Assert
            $this->assertEquals([$test_intake_staff], $result);
        }

        function test_removeIntakeStaff() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);
            $test_stay->save();

            $name = "Pimby Wimbledon";
            $test_intake_staff = new IntakeStaff($name);
            $test_intake_staff->save();

            $name2 = "Wudge Gumption";
            $test_intake_staff2 = new IntakeStaff($name2);
            $test_intake_staff2->save();

            // Act
            $test_stay->addIntakeStaff($test_intake_staff);
            $test_stay->addIntakeStaff($test_intake_staff2);
            $test_stay->removeIntakeStaff($test_intake_staff);
            $result = $test_stay->getIntakeStaff();

            // Assert
            $this->assertEquals([$test_intake_staff2], $result);
        }

        function test_addAndGetMeds() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            $med_name = "Zoloft";
            $dosage = "30mg";
            $time_of_day = "04:05:00";
            $notes = "Take with food.";
            $test_med = new Med($med_name, $dosage, $time_of_day, $notes);

            // Act
            $test_stay->save();
            $test_med->save();
            $test_stay->addMeds($test_med);
            $result = $test_stay->getMeds();

            // Assert
            $this->assertEquals([$test_med], $result);
        }

        function test_removeMeds() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);
            $test_stay->save();

            $med_name = "Zoloft";
            $dosage = "30mg";
            $time_of_day = "04:05:00";
            $notes = "Take with food.";
            $test_med = new Med($med_name, $dosage, $time_of_day, $notes);
            $test_med->save();

            $med_name2 = "Splenda";
            $dosage2 = "80mg";
            $time_of_day2 = "06:06:00";
            $notes2 = "Sweeten it up?";
            $test_med2 = new Med($med_name2, $dosage2, $time_of_day2, $notes2);
            $test_med2->save();

            // Act
            $test_stay->addMeds($test_med);
            $test_stay->addMeds($test_med2);
            $test_stay->removeMeds($test_med);
            $result = $test_stay->getMeds();

            // Assert
            $this->assertEquals([$test_med2], $result);
        }

        function test_addAndGetSocialWorker() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            $name = "Pimbles Wimbledon";
            $test_social_worker = new SocialWorker($name);

            // Act
            $test_stay->save();
            $test_social_worker->save();
            $test_stay->addSocialWorker($test_social_worker);
            $result = $test_stay->getSocialWorkers();

            // Assert
            $this->assertEquals([$test_social_worker], $result);
        }

        function test_removeSocialWorker() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);
            $test_stay->save();

            $name = "Pimbles Wimbledon";
            $test_social_worker = new SocialWorker($name);
            $test_social_worker->save();

            $name2 = "Wudge Gumption";
            $test_social_worker2 = new SocialWorker($name2);
            $test_social_worker2->save();

            // Act
            $test_stay->addSocialWorker($test_social_worker);
            $test_stay->addSocialWorker($test_social_worker2);
            $test_stay->removeSocialWorker($test_social_worker);
            $result = $test_stay->getSocialWorkers();

            // Assert
            $this->assertEquals([$test_social_worker2], $result);
        }

        function test_find() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 1;
            $exited_by = "Grandmother";
            $lice = 0;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            // Act
            $test_stay->save();
            $result = Stay::find($test_stay->getId());

            // Assert
            $this->assertEquals($test_stay, $result);
        }

        function test_search() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 0;
            $exited_by = "Grandmother";
            $lice = 1;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            $intake_date_time2 = "2014-11-08 04:05:06";
            $exit_date_time2 = "2015-05-03 04:05:06";
            $run_risk2 = 1;
            $exited_by2 = "Father";
            $lice2 =0;
            $destination2 = 'Home';
            $test_stay2 = new Stay($intake_date_time2, $exit_date_time2, $run_risk2, $exited_by2, $lice2, $destination2);

            // Act
            $test_stay->save();
            $test_stay2->save();

            $form_array = ['intake_date_time' => null,
            'exit_date_time'=>null,
            'run_risk'=>null,
            'exited_by'=>"mother",
            'lice'=>null,
            'destination'=>null];
            $result = Stay::search($form_array);

            // Assert
            $this->assertEquals([$test_stay], $result);
        }

        function test_update() {
            // Arrange
            $intake_date_time = "1999-01-08 04:05:06";
            $exit_date_time = "2000-01-08 04:05:06";
            $run_risk = 0;
            $exited_by = "Grandmother";
            $lice = 1;
            $destination = 'Home';
            $test_stay = new Stay($intake_date_time, $exit_date_time, $run_risk, $exited_by, $lice, $destination);

            // Act
            $test_stay->save();

            $form_array = ['intake_date_time' => null,
            'Exit_date_time'=>null,
            'run_risk'=>null,
            'exited_by'=>"Father",
            'lice'=>null,
            'destination'=>null];

            $test_stay->update($form_array);
            $result = $test_stay->getExitedBy();

            // Assert
            $this->assertEquals("Father", $result);
        }

    }

?>
