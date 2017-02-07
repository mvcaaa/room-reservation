/**
 * Created by MvC on 07.02.2017.
 */

app.controller('RoomsCtrl', function($scope, Room, ngProgress, toaster) {

    $scope.room = new Room();

    var refresh = function() {
        $scope.rooms = Room.query();
        $scope.room ="";
    }
    refresh();

    $scope.add = function(room) {
        Room.save(room,function(room){
            refresh();
        });
    };

    $scope.update = function(room) {
        room.$update(function(){
            refresh();
        });
    };

    $scope.remove = function(room) {
        room.$delete(function(){
            refresh();
        });
    };

    $scope.edit = function(id) {
        $scope.room = Room.get({ id: id });
    };

    $scope.deselect = function() {
        $scope.room = "";
    }
    
    
})