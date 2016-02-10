var app = angular.module('ServerApp' , []);

app.service('MyService' , function($http){

	this.listData = function() {
	   return $http.get("http://localhost/angularjs/servers.php");
	};
	
	this.entry = function(server_ip,server_type,user_name,pass_word) {
		return $http.post("http://localhost/angularjs/server_entry.php",
			{
				server_ip: server_ip ,
				server_type: server_type ,
				user_name: user_name,
				pass_word: pass_word
			});	
	};

	
});

app.controller('ServerCtrl' , function($scope , $http , MyService){
	//load modal	
	$scope.new_entry = function(){};
		
	$scope.save_data = function() {	
		MyService.entry($scope.server_ip,$scope.server_type,$scope.user_name,$scope.pass_word).then(function(data){
			console.log(data);
		});		
	};
	
	// list of all data	
	MyService.listData().then(function(data){
		$scope.servers = data.data;
	});
	
});