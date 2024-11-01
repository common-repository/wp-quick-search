(function () {
    "use strict";
    var wqs = angular.module("wqs", ['ngAnimate']);

    wqs.config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%=');
        $interpolateProvider.endSymbol('%>');
    });

    wqs.controller('wqs_search_controller', function ($scope, $http) {
        var wqs_api_url = jQuery('#wqs_api_url').val();
        $http.get(wqs_api_url).success(function (data) {
            $scope.results = data;
        });


    });

    // Clear a form input with the ESC key
    wqs.directive('clearWithEsc', function () {
        return {
            restrict: 'A',
            require: '?ngModel',
            link: function (scope, element, attrs, controller) {
                element.on('keydown', function (ev) {
                    if (ev.keyCode != 27) return;

                    scope.$apply(function () {
                        controller.$setViewValue("");
                        controller.$render();
                    });
                });
            },
        };
    });

})();
jQuery(document).ready(function () {
    jQuery("#wqs-searchinput").label_better({
        position: "top", // This will let you define the position where the label will appear when the user clicked on the input fields. Acceptable options are "top", "bottom", "left" and "right". Default value is "top".
        animationTime: 500, // This will let you control the animation speed when the label appear. This option accepts value in milliseconds. The default value is 500.
        easing: "ease-in-out", // This option will let you define the CSS easing you would like to see animating the label. The option accepts all default CSS easing such as "linear", "ease" etc. Another extra option is you can use is "bounce". The default value is "ease-in-out".
        offset: 10, // You can add more spacing between the input and the label. This option accepts value in pixels (without the unit). The default value is 20.
        hidePlaceholderOnFocus: true // The default placeholder text will hide on focus
    });
});