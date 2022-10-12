
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>AirportsApp</title>
  <style>
	  .h3{
		font-family: Verdana, Geneva, sans-serif;
		font-style: italic;
		text-align: center;
		color: #A60E2E;
	  }
    .column {
  column-gap: 10px;
  float: left;
  width: 33.33%;
  
}
.content {
  background-color: white;
  padding: 10px;
}

  </style>

</head>
<body>

	<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="airports.php?rt=airports/index">
        <img src="https://images.pexels.com/photos/46148/aircraft-jet-landing-cloud-46148.jpeg?cs=srgb&dl=pexels-pixabay-46148.jpg&fm=jpg" style = "height: 40px"> 
      </a>
    </div>
    <ul class="navbar-nav">
     <li class="nav-item"><a style = "color: #A60E2E" class="nav-link" href="airports.php?rt=airports/index">Airports</a></li>
     <li class="nav-item"><a style = "color: #A60E2E" class="nav-link" href="airports.php?rt=airports/new_airport">Add Airport</a></li>
     <li class="nav-item"><a style = "color: #A60E2E" class="nav-link" href="airports.php?rt=airlines/new_airline">Add Airline</a></li>
    </ul>
  </div>
</nav>


<h3 class="h3 my-2 font-weight-light"><?php echo $title; ?></h3>
