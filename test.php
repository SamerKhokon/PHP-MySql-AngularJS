<!DOCTYPE html>
<html ng-app="myFirstApp">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	   <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
</head>
<body ng-controller="GetCustomers">


<div class="container">

    <div class="row">
		<div class="span12">
		    <table class="table table-stripped">
				<thead>
					<tr><th>ID</th><th>Company</th><th>ContactName</th>
					<th>Address</th><th>ContactTitle</th>
					<th>Country</th><th>Phone</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="customer in customers">
						<td>{{customer.ID}}</td>
						<td>{{customer.CompanyName}}</td>
						<td>{{customer.ContactName}}</td>
						<td>{{customer.Address}}</td>
						<td>{{customer.ContactTitle}}</td>
						<td>{{customer.Country}}</td>
						<td>{{customer.Phone}}</td>
					</tr>
				</tbody>   
		    </table>
		</div>
    </div> 

	
</div>

<script type="text/javascript" src="js/angular.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>