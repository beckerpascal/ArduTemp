#ArduTemp
A collection of code to read a sensor by an Arduino, send these data to a web server and display it with a diagram.

##Used Hardware
* Arduino Nano v3.0
* Ethernet interface: ENC28J60 with [Ethercard](https://github.com/jcw/ethercard)
* BMP085 temperature and barometric sensor
* Web server with php and MySQL database
* Front end with HTML, CSS and [Highcharts.js](www.highcharts.com)

##Setup
* Adapt Arduino code to your use case (server name, file name, etc.)
* Compile code for your Arduino board
* Adapt 'connect.php' to fit your MySQL database (user, password, db_name, server)
* Upload files to your web server
* Enjoy :-)
