@echo off 
echo Starting Apache and MySql for Linkeds...

start "" "C:\xampp\apache_start.bat"
start "" "C:\xampp\mysql_start.bat"


echo Waiting for services to start
timeout /t 3 /nobreak > nul

echo Opening Link Saver...
start "" "http://localhost/linkeds/index.php"

echo services started and browser opened!
