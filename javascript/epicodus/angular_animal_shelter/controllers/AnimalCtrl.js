AnimalShelter.controller("AnimalCtrl", function AnimalCtrl($scope) {
    $scope.animals = [];
    $scope.adoptedAnimals = [];

    $scope.addAnimal = function() {
        $scope.animals.push({ name: $scope.animalName, type: $scope.animalType });
        $scope.animalName = null;
        $scope.animalType = "";
    }

    $scope.adoptAnimal = function(animal) {
        var index = $scope.animals.indexOf(animal);
        $scope.animals.splice(index, 1);
        $scope.adoptedAnimals.push(animal);
    }

    $scope.unadoptAnimal = function(animal) {
        var index = $scope.adoptedAnimals.indexOf(animal);
        $scope.adoptedAnimals.splice(index, 1);
        $scope.animals.push(animal);
    }

    $scope.deleteAnimal = function(animal) {
        if ($scope.animals.indexOf(animal) !== -1) {
            var index = $scope.animals.indexOf(animal);
            $scope.animals.splice(index, 1);
        } else {
            var index = $scope.adoptedAnimals.indexOf(animal);
            $scope.adoptedAnimals.splice(index, 1);
        }
    }

    $scope.startsWith = function(actual, expected) {
        var lowerStr = (actual + "").toLowerCase();
        return lowerStr.indexOf(expected.toLowerCase()) === 0;
    }
});
