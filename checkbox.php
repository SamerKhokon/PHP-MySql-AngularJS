<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular.min.js"></script>
  <meta charset="utf-8">
  <title>JS Bin</title>
  <script type="text/javascript">
    var app = angular.module('test' , []);
	app.controller('Test' , function($scope,$http){
		var albums_url = "http://localhost/angularjs/adcodes.php";
		
		/*$scope.albums = [
			{id:1, name:'A+'} ,
			{id:2, name:'A'} ,
			{id:3, name:'A-'} ,
			{id:4, name:'B+'} ,
			{id:5, name:'B'} ,
			{id:6, name:'B-'} ,
			{id:7, name:'C'} ,
			{id:8, name:'D'} ,
			{id:9, name:'F'} 
		];*/
	
		$http.get(albums_url).success(function(data){
			$scope.albums = data;
		});
	
		$scope.save = function() {
		   console.log('save');
			$scope.albumArray = [];
			angular.forEach($scope.albums , function(album){
			    if(album.selected) {
					$scope.albumArray.push(album.name);
				}
			});
		};	
		
		$scope.getComboValue = function() {
		    //var albumId = $scope.albums;    
			console.log( $scope.alb.id);
			
		};
		
		
	});
  </script>
</head>
<body ng-app='test' ng-controller="Test">

	<ul>
		<li ng-repeat="album in albums">
			<input type="checkbox" ng-model="album.selected" value={{album.name}} /> {{album.name}}
		</li>
	</ul>
 
	<select ng-model="alb" >	   
	   <option ng-repeat="a in albums" value="">{{ a.name }}</option>
	</select>
    {{ alb }}
  
  <button type='button' ng-click="save()">Save</button><br>
	Saved results:<br>{{albumArray}}
</body>
</html>