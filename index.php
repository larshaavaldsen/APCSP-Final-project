<?php
$date = date("Y-m-d");
$apiKey = "Sample";
// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => "https://api.nasa.gov/neo/rest/v1/feed?start_date=$date&end_date=$date&api_key=sample",
    CURLOPT_USERAGENT => 'Get Asteriods'
]);
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);
$resp = json_decode($resp, true);
$elementCount = $resp['element_count'] - 1;
$astData = array();


for ($x = 0; $x <= $elementCount; $x++) {
  $astId = $resp['near_earth_objects'][$date][$x]['id'];
  $estDiameter = $resp['near_earth_objects'][$date][$x]['estimated_diameter']['feet'];
  $velocity = $resp['near_earth_objects'][$date][$x]['close_approach_data']['0']['relative_velocity']['miles_per_hour'];
  $missDis = $resp['near_earth_objects'][$date][$x]['close_approach_data']['0']['miss_distance']['miles'];
  array_push($astData, array($estDiameter, $velocity, $missDis, $astId));
}
$printData = json_encode($astData);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Asteroid Tracker</title>
    <script lang="js">
    
    
    </script>
  </head>
  <body>
      <nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="date" placeholder="date" aria-label="date">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
      <br>
<div class="container">
      <div class="card">
  <div class="card-header">
    Near Earth Object
  </div>
  <div class="card-body">
    <p class="card-text">Asteroid ID: 34321</p>
      <p class="card-text">Is Hazardous: Yes</p>
      <p class="card-text">Velocity (MPH): 3421</p>
      <p class="card-text">Miss Distance: 34321</p>
      <p class="card-text">Estimated Diameter: 34321</p>
      <p class="card-text"><a href="http://spaceguard.rm.iasf.cnr.it/NScience/neo/neo-what/ast-magnitude.htm">Magnitude</a>: 34321</p>
  </div>
</div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>