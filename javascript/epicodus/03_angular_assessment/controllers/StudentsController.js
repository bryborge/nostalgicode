StudentSignin.controller("StudentsCtrl", function StudentsCtrl($scope, StudentsFactory) {
  $scope.students = StudentsFactory.students;
  $scope.StudentsFactory = StudentsFactory;

  // Sign in - points to Student Factory
  $scope.signIn = function(studentName) {
    StudentsFactory.signIn(studentName);
  };

  // Sign out - points to Student Factory
  $scope.signOut = function(studentName) {
    StudentsFactory.signOut(studentName);
  };

  // Search progressively by first letter
  $scope.startsWith = function(actual, expected) {
    var lowerStr = (actual + "").toLowerCase();
    return lowerStr.indexOf(expected.toLowerCase()) === 0;
  };

  // Add a Student
  $scope.addStudent = function() {
    var newStudent = $scope.studentName;
    StudentsFactory.addStudent(newStudent);
    $scope.studentName = null;
    alert(newStudent + " added successfully.");
  };

});
