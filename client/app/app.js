var app = angular.module('myApp', ['ngResource', 'ngProgress', 'ngAnimate', 'toaster']);
app.config(function ($httpProvider) {
  $httpProvider.interceptors.push('myHttpInterceptor');
});

// Handle http server errors
app.factory('myHttpInterceptor', function ($q,toaster) {
    return {
        responseError: function (response) {
          console.log(response);
          if(response.data){
            if(response.data.message)
            toaster.error("Error: ", response.data.message);
            else
            toaster.error("Error: ", response.data);
          }
          return $q.reject(response);
        }
    };
});

app.directive('loading',   ['$http', 'ngProgress', function ($http, ngProgress)
{
    return {
        restrict: 'A',
        link: function (scope, elm, attrs)
        {
            scope.isLoading = function () {
                return $http.pendingRequests.length > 0;
            };

            scope.$watch(scope.isLoading, function (v)
            {
                if(v){
                    ngProgress.start();
                }else{
                    ngProgress.complete();
                }
            });
        }
    };
}]);

app.factory('Room', function($resource) {
  return $resource(' http://localhost:8888/rooms/:id', { id: '@id' }, {
    update: {
      method: 'PUT'
    }
  });
});
