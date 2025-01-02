@echo off
rem Start XAMPP
start "" ""E:\XAMPP\xampp-control.exe""

rem Wait for XAMPP to start (adjust the timeout as needed)
timeout /t 5 /nobreak

rem Start your Node.js server
start "" "C:\Program Files\nodejs\node.exe" "E:\XAMPP\htdocs\Web project\instascan-master\docs\node_testing.js"

rem Open Apache admin page in default web browser
explorer "http://localhost/Web Project/homepage.html"

