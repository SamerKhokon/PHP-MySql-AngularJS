 <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>get selected value from dropdownlist in angularjs</title>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular.min.js"></script>
<script type="text/javascript">
var app = angular.module('sampleapp', [])
app.controller('samplecontrol', function ($scope) {
$scope.albums = [
		{id: '1',name: 'Suresh Dasari'}, 
		{id: '2',name: 'Rohini Alavala'}, 
		{id: '3',name: 'Mahendra Dasari'}, 
		{id: '4',name: 'Madhav Sai'}, 
		{id: '5',name: 'Mahesh Dasari'}, 
		{id: '6',name: 'Sateesh Alavala'}
	];
	
	
	$scope.test = function() {
	    console.log($scope.albums[$scope.ddlvalue-1].name);
	    //console.log($scope.ddlvalue);
	};
	
	$scope.AppendText = function() {
	    var dv = angular.element(document.querySelector('#myTable'));
		dv.append('<tr><td>B</td></tr>');
		$scope.myTableVar  = dv;
	};
	
});
</script>
</head>
<body data-ng-app="sampleapp" data-ng-controller="samplecontrol">

	<form id="form1">
		Select Name:
		<select ng-change="test()" data-ng-model="ddlvalue"
		ng-options="album.id as album.name for album in albums">
			<option value="">--Select--</option>			
		</select>
		<br />
		Selected Value is:{{ddlvalue}}
		<!-- <option data-ng-repeat="t in sample" value="">{{t.name}}</option> -->
	</form>
	
	
	<h2>Angular JS Append Example</h2>
	
	<input type="button" ng-click="AppendText" value="Append Text"/>
	<table id="myTable" ng-bind-html="myTableVar">
	<tr><td>A</td></tr>
	</table>
	

</body>
</html>