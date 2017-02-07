# Solution #

## Requirements ##
PHP 7

Composer

MySQL

## Installation ##
1. Clone repository
2. cd to ```basic``` folder
3. Run ```composer update``` - it will install all req. deps. 
4. Create empty MySQL database ```yii2_room_service```
5. Change database credentials in ```config\db.php```
6. Run ```php yii migrate``` to create empty tables. 
7. Run ```php yii serve 0.0.0.0 --port=8888``` to start application server. It serves only REST requests. Leave it running. 
8. cd to ```client``` folder in new shell.
9. If app server is on different host - edit line 45 of ```app\app.js```
10. Run local http server to serve static client - for example ```python -m SimpleHTTPServer```
11. Point browser to client host address, port 8000

## Notes ##
- Yii2 installed from basic skel.
- For simplicity no Apache2/php-fpm configs used - only Yii2 build-in web server for app and python SimpleHTTPServer for statics
- For simplicity and speed - there is no Bower/Npm - just static js/css/html 
- Look at models\*, controllers\RoomController - there is all of the app logic

Small demo of working app uploaded on Youtube - https://youtu.be/R4k8ucalllc
