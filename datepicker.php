<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" type="text/css"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" type="text/css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.15/angular.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
<script>
// init jquery functions and plugins
$(function(){  
	$('#datepicker').datepicker({autoclose:true}).on("changeDate", function(e){
		console.log(e.date);
    });    
    
});


// init angular app and ctrls
var app = angular.module('myApp',[]);
app.controller('ctrlTags',function($scope,$http){

	/*****************************************************************
	** for populating array values
	******************************************************************
	var albums_url = "http://localhost/angularjs/adcodes.php";
	$http.get(albums_url).success(function(data){
			$scope.albums = data;
	});	
	*******************************************************************/

	//static array for checkbox values
	$scope.albums = [
		{id:1, name: 'C++' } ,
		{id:2,name: 'JAVA' } ,
		{id:3,name: 'C#' } ,
		{id:4,name: 'Python' } ,
		{id:5,name: 'PHP' }];
		
	

	$scope.getVl = function() {
	    var dt = $scope.dt1;
		var gen = $scope.gender;
		
		$scope.albumArray = [];	
		angular.forEach($scope.albums , function(album){
			if(album.selected) {
				$scope.albumArray.push(album.name);
			}
		});
		var dataStr = dt+" ,"+gen+","+$scope.albumArray
		alert(dataStr);
		
		
		
		
	};	
});


</script>
</head>
<body>

<div ng-app="myApp">
  <div class="container" ng-controller="ctrlTags">
    
    <div class="row" id="exDateTime">
      <div class="col-sm-3">
		<fieldset>
        <legend><h4>AngularJS Form Inputs</h4></legend>
		<br/>
		
		
		<div class="form-group">
          <label class="control-label">First Name</label>
		  <div class="input-group" style="width:260px;">
            <input class="form-control" ng-model="firstName" type="text">
		  </div>	
		</div>
		<div class="form-group">
          <label class="control-label">Last Name</label>
		  <div class="input-group" style="width:260px;">
            <input class="form-control" ng-model="lastName" type="text">
		  </div>	
		</div>
		<div class="form-group">
          <label class="control-label">Gender</label>
          <div class="input-group" style="width:260px;">
            <select class="form-control" ng-model="gender">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
           
          </div>
        </div>
		
		
        <div class="form-group">
          <label class="control-label">Date</label>
          <div class="input-group date" id="datepicker">
            <input class="form-control" ng-model="dt1" type="text">
            <span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
			</span>
          </div>
        </div>
		
		
		<div class="form-group">
			<label class="control-label">Languages</label>
			<div ng-repeat="album in albums">	
					<div class="checkbox">
						<label><input  type="checkbox" ng-model="album.selected" value="{{album.name}}"/>{{album.name}}</label>
					</div>	
			</div>		
		</div>				
       
        
       
		
		<div class="form-group">
		   <input type="button" ng-click="getVl()" class="btn btn-primary" value="Get Value"/>
		</div>
		</fieldset>
        
      </div><!--/col--> 
      
    </div><!--/row-->
    
  </div><!--/container-->

</div>

</body>
</html>

<!-- http://stackoverflow.com/questions/31885059/angularjs-dropdown-onchange-selected-text-and-value 
-->