<?php

$username="";//use your username probably root
$password="";//use your password
$database="";//use your database name

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die ( "Unable to make it happen Cap'n");

//query to get temperature for the last week of data
$query = "SELECT datetime, temperature FROM bmesensor ORDER BY datetime DESC LIMIT 1008";
$result = mysql_query($query);
$dateTemp = array();
$index = 0;
while ($row = mysql_fetch_array($result, MYSQL_NUM))
        {
        $dateTemp[$index]=$row;
        $index++;
        }

//query to get pressure for the last week of data
$queryP = "SELECT datetime, pressure FROM bmesensor ORDER BY datetime DESC LIMIT 1008";
$resultP = mysql_query($queryP);
$datePress = array();
$indexP = 0;
while ($row = mysql_fetch_array($resultP, MYSQL_NUM))
        {
        $datePress[$indexP]=$row;
        $indexP++;
        }

//query to get humidity for the last week of data
$queryH = "SELECT datetime, humidity FROM bmesensor ORDER BY datetime DESC LIMIT 1008";
$resultH = mysql_query($queryH);
$dateHumid = array();
$indexH = 0;
while ($row = mysql_fetch_array($resultH, MYSQL_NUM))
        {
        $dateHumid[$indexH]=$row;
        $indexH++;
        }

//echo json_encode($datePress, JSON_NUMERIC_CHECK);
mysql_close();

?>


<!DOCTYPE html>
<html>
<head>
        <title>HighChart</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data-2012-2022.min.js"></scri$


</head>
<body>


<script src="charts/js/highcharts.js"></script>
<script src="charts/js/modules/exporting.js"></script>

//make variable to hold the temperatures, and feed that into a function in a separate file
<script type="text/javascript">var numbersTemperature = <?php echo json_encode($dateTemp, JSON_NUMERIC_CHECK); ?>;</script>
<script type="text/javascript" src="js/temperature.js"></script>

<div id = "chart-A" class="container">
<p id="demo-T"></p>
</div>

//make variable to hold the pressures, and feed that into a function in a separate file
<script type = "text/javascript">var numbersPressure = <?php echo json_encode($datePress, JSON_NUMERIC_CHECK); ?>;</script>
<script type = "text/javascript" src="js/pressure.js"></script>

<div id = "chart-B" class="container">
<p id = "demo-P"></p>
</div>

//make variable to hold the humidity, and feed that into a function in a separate file
<script type = "text/javascript">var numbersHumidity = <?php echo json_encode($dateHumid, JSON_NUMERIC_CHECK); ?>;</script>
<script type = "text/javascript" src="js/humidity.js"></script>

<div id = "chart-C" class = "container">
<p id = "demo"></p>
</div>

</body>
</html>
