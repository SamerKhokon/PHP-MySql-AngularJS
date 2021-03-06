<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" type="text/css"/>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" type="text/css"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" type="text/css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.15/angular.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/highcharts-more.js"></script>
<script src="https://rawgithub.com/pablojim/highcharts-ng/master/src/highcharts-ng.js"></script>
<script>
// init jquery functions and plugins
$(function(){  
	$('#datepicker').datepicker({autoclose:true}).on("changeDate", function(e){
		console.log(e.date);
    });    
    
});


// init angular app and ctrls
var app = angular.module('myApp',["highcharts-ng"]);

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
				  text: 'Piechart'
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


app.controller('ctrlTags', function($scope,$http,limitToFilter) {
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
	
	//static array for graph values
	$scope.ideas = [
		['ideas1', 1],
		['ideas2', 8],
		['ideas3', 5],
		['ideas3', 3]
	  ];	  
	$scope.limitedIdeas = limitToFilter($scope.ideas, 4);
	
	
	$scope.addPoints = function () {
        var seriesArray = $scope.highchartsNG.series
        var rndIdx = Math.floor(Math.random() * seriesArray.length);
        seriesArray[rndIdx].data = seriesArray[rndIdx].data.concat([1, 10, 20])
    };

    $scope.addSeries = function () {
        var rnd = []
        for (var i = 0; i < 10; i++) {
            rnd.push(Math.floor(Math.random() * 20) + 1)
        }
        $scope.highchartsNG.series.push({
            data: rnd
        })
    };

    $scope.removeRandomSeries = function () {
        var seriesArray = $scope.highchartsNG.series
        var rndIdx = Math.floor(Math.random() * seriesArray.length);
        seriesArray.splice(rndIdx, 1)
    };

    $scope.options = {
        type: 'line'
    };

    $scope.swapChartType = function () {
        if (this.highchartsNG.options.chart.type === 'line') {
            this.highchartsNG.options.chart.type = 'bar'
        } else {
            this.highchartsNG.options.chart.type = 'line'
        }
    };

    $scope.highchartsNG = {
        options: {
            chart: {
                type: 'bar'
            }
        },
        series: [{
            data: [10, 15, 12, 8, 7]
        }],
        title: {
            text: 'Bar Chart'
        },
        loading: false
    };
	
	
	$scope.uploadFile = function uploadFile(files) {
			var fd = new FormData();
			//Take the first selected file
			fd.append("file", files[0]);
			
			$http.post("http://localhost/angularjs/up.php", fd, {
				withCredentials: true,
				headers: {'Content-Type': undefined },
				transformRequest: angular.identity
			}).success(function(data, status, headers, config){
				alert(data);
			});
		};
	
	
	$scope.getVl = function() {
	    var fName = $scope.firstName;
		var lName = $scope.lastName;
	    var dt = $scope.dt1;
		var gen = $scope.gender;
		
		$scope.albumArray = [];	
		angular.forEach($scope.albums , function(album){
			if(album.selected) {
				$scope.albumArray.push(album.name);
			}
		});
		var f = document.getElementById('file').files[0].name;
		var dataStr = fName+","+lName+","+dt+" ,"+gen+","+$scope.albumArray+","+$scope.selectedItem+","+f;
		alert(dataStr);		
	};
	
	/*$scope.getAlbumId = function(){
		alert($scope.selectedItem);
	};*/
	
});


</script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
</head>
<body>

<div ng-app="myApp">
  <div class="container" ng-controller="ctrlTags">
    
    <div class="row" id="exDateTime">
      <div class="col-sm-6">
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
          <div class="input-group date" style="width:260px;" id="datepicker">
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
			<label class="control-label">Select value get id</label>
			<div class="input-group">
				<label>
					<select class="form-control" ng-model="selectedItem" ng-change="getAlbumId()">
						<option ng-repeat="album in albums" ng-selected="selectedItem == album.id" value="{{album.id}}">{{album.name}}</option>
					</select>
				</label>
			</div>	
		</div>
		
		
		<div class="form-group">
			<label class="control-label">Select File</label>
			<div class="input-group">		
				<input type="file" ng-model="fileName" id="file" name="file" onchange="angular.element(this).scope().uploadFile(this.files)"/>
			</div>
		</div>	
		
		<div class="form-group">
			<label class="control-label">Editor</label>
			<div  class="input-group">
				<textarea id="elm1" name="elm1" rows="15" cols="60" style="width: 50%">
				&lt;p&gt;
					This is some example text that you can edit inside the &lt;strong&gt;TinyMCE editor&lt;/strong&gt;.
				&lt;/p&gt;
				&lt;p&gt;
				Nam nisi elit, cursus in rhoncus sit amet, pulvinar laoreet leo. Nam sed lectus quam, ut sagittis tellus. Quisque dignissim mauris a augue rutrum tempor. Donec vitae purus nec massa vestibulum ornare sit amet id tellus. Nunc quam mauris, fermentum nec lacinia eget, sollicitudin nec ante. Aliquam molestie volutpat dapibus. Nunc interdum viverra sodales. Morbi laoreet pulvinar gravida. Quisque ut turpis sagittis nunc accumsan vehicula. Duis elementum congue ultrices. Cras faucibus feugiat arcu quis lacinia. In hac habitasse platea dictumst. Pellentesque fermentum magna sit amet tellus varius ullamcorper. Vestibulum at urna augue, eget varius neque. Fusce facilisis venenatis dapibus. Integer non sem at arcu euismod tempor nec sed nisl. Morbi ultricies, mauris ut ultricies adipiscing, felis odio condimentum massa, et luctus est nunc nec eros.
				&lt;/p&gt;
				</textarea>
			</div>	
		</div>		
		
		
		<div class="form-group">
		   <input type="button" ng-click="getVl()" class="btn btn-primary" value="Get Value"/>
		</div>
		</fieldset>
        
      </div><!--/col--> 
	  
	  
		<div class="col-sm-6">
			<fieldset>
			<legend>AngularJS Graphical Presentation</legend>
			<div class="hc-pie" items="limitedIdeas"></div>
			<highchart id="chart1" config="highchartsNG"></highchart>
			</fieldset>
		</div>
	  
	  
	  
    </div><!--/row-->
    
  </div><!--/container-->

</div>

</body>
</html>

<!-- http://stackoverflow.com/questions/31885059/angularjs-dropdown-onchange-selected-text-and-value 
-->