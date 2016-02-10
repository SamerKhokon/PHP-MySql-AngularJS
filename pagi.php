<!DOCTYPE html>
<html class="ng-scope"  ng-app="myFirstApps">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
	<style type="text/css">
		ul>li, a{cursor: pointer;}	
	</style>
</head>
<body class="ng-scope" ng-controller="customersCrtl">

<div  class="container">

    <div class="row">
		<div class="span12">
		   <a href="test.php">List</a>&nbsp;&nbsp;|
		   <a href="form.php">Form</a>&nbsp;&nbsp;
		</div>
	</div>	

	<div class="row">
		<div class="col-md-2">PageSize:
			<select ng-model="entryLimit" class="form-control">
				<option>5</option>
				<option>10</option>
				<option>20</option>
				<option>50</option>
				<option>100</option>
			</select>
		</div>
		<div class="col-md-3">Filter:
			<input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
		</div>
		<div class="col-md-7">
			<h5>Filtered {{ filtered.length }} of {{ totalItems}} total customers</h5>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12" ng-show="filteredItems > 0">
			<table class="table table-striped table-bordered">
			<thead>
			<th>ID&nbsp;<a ng-click="sort_by('ID');"><i class="glyphicon glyphicon-sort"></i></a></th>
			<th>Company Name&nbsp;<a ng-click="sort_by('CompanyName');"><i class="glyphicon glyphicon-sort"></i></a></th>
			<th>Contact Name&nbsp;<a ng-click="sort_by('ContactName');"><i class="glyphicon glyphicon-sort"></i></a></th>
			</thead>
			<tbody>
				<tr ng-repeat="data in filtered = (customers | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
					<td>{{data.ID}}</td>
					<td>{{data.CompanyName}}</td>
					<td>{{data.ContactName}}</td>
				</tr>
			</tbody>
			</table>
		</div>
		<div class="col-md-12" ng-show="filteredItems == 0">
			<div class="col-md-12">
				<h4>No customers found</h4>
			</div>
		</div>
	
		<div class="col-md-12" ng-show="filteredItems > 0">
			<div pagination="" page="currentPage" on-select-page="setPage(page)" 
			boundary-links="true" total-items="filteredItems" 
			items-per-page="entryLimit" class="pagination-small" 
			previous-text="&laquo;" next-text="&raquo;"></div>
		</div>
		
	</div>
</div>

<script type="text/javascript" src="js/angular.min.js"></script>
<script type="text/javascript" src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<script type="text/javascript" src="js/pagi_app.js"></script>
</body>
</html>