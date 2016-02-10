var app = angular.module('myFirstApp',[]);

app.controller('GetCustomers', function($scope , $http){
    getAllData();
	function getAllData()
	{
	    $http.get('http://localhost/PHP_MYSQL_AngularJS/all.php').success(function(data){
			$scope.customers = data;
	    });
	}	
});
