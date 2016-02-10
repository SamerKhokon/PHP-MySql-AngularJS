<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.3/angular.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/highcharts-more.js"></script>
<script>
	function MyCtrl($scope, limitToFilter) {
	  $scope.ideas = [
		['ideas1', 1],
		['ideas2', 8],
		['ideas3', 5],
		['ideas3', 3]
	  ];
	  
	  $scope.limitedIdeas = limitToFilter($scope.ideas, 4);
	}

	var app = angular.module('myApp', []);
	app.directive('hcPie', function () {
	  return {
			restrict: 'C',
			replace: true,
			scope: {
			  items: '='
			},
			controller: function ($scope, $element, $attrs) {
			  console.log(2);

			},
			template: '<div id="container" style="margin: 0 auto">not working</div>',
			link: function (scope, element, attrs) {
			  console.log(3);
			  var chart = new Highcharts.Chart({
				chart: {
				  renderTo: 'container',
				  plotBackgroundColor: null,
				  plotBorderWidth: null,
				  plotShadow: false
				},
				title: {
				  text: 'Browser market shares at a specific website, 2010'
				},
				tooltip: {
				  pointFormat: '{series.name}: <b>{point.percentage}%</b>',
				  percentageDecimals: 1
				},
				plotOptions: {
				  pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
					  enabled: true,
					  color: '#000000',
					  connectorColor: '#000000',
					  formatter: function () {
						return '<b>' + this.point.name + '</b>: ' + this.percentage + ' %';
					  }
					}
				  }
				},
				series: [{
				  type: 'pie',
				  name: 'Browser share',
				  data: scope.items
				}]
			  });
			  scope.$watch("items", function (newValue) {
					chart.series[0].setData(newValue, true);
					console.log(newValue);
			  }, true);
			  
			}
		}
	});
</script>
</head>
<body>
	<div ng-app="myApp">
		<div ng-controller="MyCtrl">
			<div class="hc-pie" items="limitedIdeas"></div>
		</div>
	  
	  
	</div>
</body>
</html>