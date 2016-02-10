 <html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.min.js"></script>
        <script type="text/javascript">
		var app = angular.module('myApp', []);
		
		app.service('CardService' , function($http){
		    var d = [{
			   name : 'Bob' ,
			   phone: '1234567'
			}];
		    this.addCart = function(){
			   return d;
			}; 
		});
		
        function Card() {
            this.name = 'Bob';
            this.phone = '1234567';
        }

        app.controller('CustomerCardController', function ($scope , CardService) {
            $scope.cards = [];
            $scope.addCard = function() 
			{
                $scope.cards.push(new Card());
				//var s = CardService.addCart();
                //$scope.cards.push(s);
				//console.log(s[0].name);
            };
        });

        app.directive('myCard', function(){
            return {
                restrict: 'A',
                template: '<div>{{aCard.name}} {{aCard.phone}}</div>',
                replace: true,
                transclude: false,
                scope: {
                    aCard: '=myCard'
                }
            };
        });
        </script>
    </head>
    <body ng-app="myApp">
	
        <div ng-controller="CustomerCardController">
            <button ng-click="addCard()">Add new card</button>
			
            <div ng-repeat="card in cards" my-card="card"></div>
			
        </div>
    </body>
</html>