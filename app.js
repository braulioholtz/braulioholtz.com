var app = angular.module('BraulioApp', ['ngMaterial','ngSanitize']).config(function ($mdThemingProvider) {
    $mdThemingProvider.theme('default').primaryPalette('blue', { 'default': '900'}).backgroundPalette('blue-grey')
});
app.controller('BraulioController', function ($scope, $http) {
    $scope.results = [];
    $http.get("mydata.json").then(function (response) {  
        $scope.results = response.data;
    });
    $scope.EnterSocial = function (page) {
        ga('send', 'event', 'Social', page);
    }
    $scope.Enter = function (page) {
        ga('send', 'event', 'General', page);
    }

});

(function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

ga('create', 'UA-54080279-1', 'auto');
ga('send', 'pageview');