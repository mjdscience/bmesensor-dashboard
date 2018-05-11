# bmesensor-dashboard
This project uses a Raspberry Pi to make a Temperature, Pressure, and Humidity sensor using the BME280 sensor.

A simple python program takes the measurement, and stores it in a MySQL database.  The RPi is a web server, and a php webpage takes the last 1008 readings, and feeds them into a Highcharts graph.  

The index.php file has the php code for querying the MySQL database.  The *.js files have the formulas necessary for rendering Highcharts.
