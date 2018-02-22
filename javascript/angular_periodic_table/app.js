var PeriodicTable = angular.module("PeriodicTable", ["ui.router"]);

PeriodicTable.config(function($stateProvider) {
  $stateProvider.state("main", {
    url: "",
    templateUrl: "partials/interactive-table.html",
    controller: "TableCtrl"
  });

  $stateProvider.state("element-sort", {
    url: "/element-sort",
    templateUrl: "partials/element-sort.html",
    controller: "TableCtrl"
  });

  // $stateProvider.state("interactive-table", {
  //   url: "/interactive-table",
  //   templateUrl: "partials/interactive-table.html",
  //   controller: "TableCtrl"
  // });
});
