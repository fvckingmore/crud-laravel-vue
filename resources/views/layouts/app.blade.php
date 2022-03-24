<!doctype html>
<html lang="en">
  <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="{{ url('bootstrap.min.css') }}">

	<title>Laravel Vue CRUD</title>
  </head>
  <body>
  	@yield('content')

	<script src="{{ url('bootstrap.min.js') }}"></script>
	<script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>