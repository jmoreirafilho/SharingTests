<!DOCTYPE html>
<html ng-app="view">
<head>
	<title>
		@yield('title')
	</title>
	<link rel="stylesheet" type="text/css" href="scripts/bootstrap/css/bootstrap.min.css">
</head>
<body>
@yield('content')

<script type="text/javascript" src="scripts/angularjs/angular.min.js"></script>
@yield('scripts')

</body>
</html>