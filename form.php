<!DOCTYPE html>
<html ng-app="myFirstApp">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	   <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
</head>
<body ng-controller="formController">


<div class="container">

    <div class="row">
		<div class="span12">
		   <a href="test.php">List</a>&nbsp;&nbsp;|
		   <a href="form.php">Form</a>&nbsp;&nbsp;
		</div>
	</div>	


    <div class="row">
		<div class="span12">
		   <table class="table table-stripped">
		 		<tbody>
				<tr>
					<td><input type="text" ng-model="user.name"/></td>
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