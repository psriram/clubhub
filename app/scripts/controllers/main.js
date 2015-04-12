'use strict';

/**
 * @ngdoc function
 * @name sitesApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the sitesApp
 */
angular.module('sitesApp')
  .controller('MainCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
