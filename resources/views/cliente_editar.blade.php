<!DOCTYPE html>
<html ng-app="myApp">

<head>

    <script src="{{ URL::asset('angular.min.js')}}"></script>
</head>

<body>

    <style type="text/css">
        .top50 {
            margin-top: 50px;
        }
    </style>
    <div ng-controller="myCtrl">

        <div class="container">

            <input type="text" ng-model='obj.nome' placeholder="nome">
            <input type="text" ng-model='obj.idade' placeholder="idade">
            <button ng-click="salvar()">salvar</button>
            <button ng-click="voltar()">voltar</button>


        </div>
    </div>


    <script>
        var app = angular.module('myApp', []);

        app.controller('myCtrl', function($scope, $http) {
            $scope.obj = {
                nome: null,
                idade: null
            };


            $scope.salvar = function() {
                $http.post("/clientes/salvar", $scope.obj)
                    .then(function(response) {
                        window.location.href = '/cliente';
                    });
            }
            $scope.voltar = function() {
                window.location.href = '/cliente';

            }
            $http.get("/clientes/carregar/{{request()->route('id')}}")
                    .then(function(response) {
                        $scope.obj = response.data;
                    });

        });
    </script>
    </script>

</body>

</html>