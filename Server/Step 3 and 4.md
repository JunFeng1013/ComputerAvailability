#Server Side
##Step 3: Clone files to server
Find the folder in server. Follow this order.
![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step3-1.png)
![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step3-2.png)
---
Under this folder, you can install the git.
```
sudo apt-get update
sudo apt-get install git
```
---
And then, clone your files to server.
```
sudo git clone https://github.com/JunFeng1013/ComputerAvailability
```
![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step3-3.png)
---
You can check the folder.
![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step3-4.png)
---
If you get this picture, you can go next step right now.
##Step 4: Set database
Log in and create the database(the content is in the computer_availability.sql file)
![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step4-1.png)
![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step4-2.png)
![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step4-3.png)
---
Now, you have a database, and then, you need to connect this database to the file-computers.php.
![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step4-4.png)
```
sudo vim computers.php
```
![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step4-5.png)
---
When you get this picture, you need to find the position of username and password. And then press Insert button to change the content like this picture.(the username and password are your database's username and password)
![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step4-6.png)
---
When you finish this one, you need to press Esc to quit this process, and type in this to save and quit file.
```
:wq
```
![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step4-7.png)
---
After that, you need to change statuschange.php. The process is same with computers.php
```
sudo vim statuschange.php
```
![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step4-8.png)
![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step4-9.png)
---
Untill now, you have finished all setting on server side, and you can view the website right now. You just need to type "(server ip address)/ComputerAvailability/Server-files/computers.php"
![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step4-11.png)
![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step4-12.png)
---
If you get this picture, you can go to the client side.





