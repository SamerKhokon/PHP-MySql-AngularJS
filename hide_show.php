 <html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.min.js"></script>
        <script type="text/javascript">
		var app = angular.module('ngToggle', []);
		
		app.controller('AppCtrl',function($scope){
			$scope.custom = true;
			$scope.toggleCustom = function() {
				$scope.custom = $scope.custom === false ? true: false;
			};
		});

        
        </script>
    </head>
    <body ng-app="ngToggle">
		
		<div ng-controller="AppCtrl">
		
		
			<button ng-click="toggleCustom()">Custom</button>
			
			<span ng-hide="custom">From:
				<input type="text" id="from" />
			</span>
			<span ng-hide="custom">To:
				<input type="text" id="to" />
			</span>
			
			<span ng-show="custom"></span>
		</div>
		
	</body>
</html>