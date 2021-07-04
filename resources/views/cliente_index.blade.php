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

            <table class="table top50">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>nome</td>
                        <td>idade</td>
                        <td>editar</td>
                        <td>excluir</td>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="p in pessoas">
                        <td>@{{p.id}}</td>
                        <td>@{{p.nome}}</td>
                        <td>@{{p.idade}}</td>
                        <td><button ng-click="editar(p.id)">Editar</button></td>
                        <td><button ng-click="excluir(p.id)">Excluir</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button ng-click="criar()">Novo</button>
    </div>


    <script>
        var app = angular.module('myApp', []);

        app.controller('myCtrl', function($scope, $http) {
            $scope.criar = function() {
                window.location.href = 'cliente/criar';
            }

            $scope.editar = function(id) {
                window.location.href = 'cliente/editar/' + id;
            }

            $scope.excluir = function(id) {
                $http.delete("clientes/excluir/" + id)
                    .then(function(response) {
                        $http.get("clientes/listar")
                            .then(function(response) {
                                setTimeout(function() {
                                    $scope.$apply(function() {
                                        $scope.pessoas = response.data;
                                    });
                                }, 0);


                            });
                    });


            }
            $http.get("clientes/listar")
                .then(function(response) {
                    setTimeout(function() {
                        $scope.$apply(function() {
                            $scope.pessoas = response.data;
                        });
                    }, 0);


                });
        });
    </script>
    </script>

</body>

</html>