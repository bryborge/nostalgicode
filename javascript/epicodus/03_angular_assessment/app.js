var StudentSignin = angular.module("StudentSignin", ["ui.router"]);

StudentSignin.config(function($stateProvider) {
  $stateProvider.state("home", {
    url: "",
    templateUrl: "partials/home.html"
  });

  $stateProvider.state("signin", {
    url: "/signin",
    templateUrl: "partials/signin.html",
    controller: "StudentsCtrl"
  });

  $stateProvider.state("student-list", {
    url: "/student-list",
    templateUrl: "partials/student-list.html",
    controller: "StudentsCtrl"
  });

  $stateProvider.state("add", {
    url: "/add-student",
    templateUrl: "partials/add-students.html",
    controller: "StudentsCtrl"
  });

});
