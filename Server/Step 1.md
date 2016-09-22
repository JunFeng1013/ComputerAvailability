#Server Side
##Step 1-1: Get the AWS account
  In this system, we need to use Amazon Web Services. Therefore, we need to go to https://aws.amazon.com, and sign up an account. When you have an account, you can sign in and get this view.
  ---
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-1-1.png)
  ---
  And then, you just need to follow those picture to finish it step by step.
  ---
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-1-2.png)
##Step 1-2: Build your server
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-2-1.png)
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-2-2.png)
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-2-3.png)
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-2-4.png)
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-2-5.png)
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-2-6-1.png)
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-2-6-2.png)
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-2-7.png)
  ---
  You just need to save this .pem file in somewhere, and we need to use it to generate our password for logging in the server.
  ---
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-2-8.png)
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-2-9.png)
##Step 1-3: Connect to the server
  Because I use Windows to build this one, I'll introduce how to do that on Windows. If your system is Linux or Mac, you can follow this link: https://github.com/TonyMeiDeveloper/GuideOnTheSide/blob/master/MoreResources/TerminalSSH.md
  ---
  Before we do that, we need to download Putty, and you can find it one this page: http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html
  ---
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-3-1.png)
  ---
  When you finish that, run Puttygen at first, and you can get this picture.
  ---
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-3-2.png)
  ---
  When you load the file, you need to select the type of files to all, and find the .pem file which you saved few minutes ago.
  ---
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-3-3.png)
  ---
  And then, you can save the private key, and the parameters must be same with picture.
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-3-4.png)
  ---
  Now, you have the key of the server, and you need to connect to the server. On this step, you need to use Putty.
  ---
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-3-6.png)
  ---
  The host name is public DNS
  ---
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-3-5.png)
  ---
  You just need to paste it into that box. After that, you need to click SSH, Auth, and Browse in that order to find the .ppk key file which you just generated it few minutes ago.
  ---
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-3-7.png)
  ---
  And then, you just need to type "ubuntu" to log in.
  ---
  ![alt text](https://github.com/JunFeng1013/ComputerAvailability/blob/master/Picture/step1-3-7.png)
##Step 1-4: Setup environment
  The first thing you need to do is update.
  ---
  ```
  sudo apt-get update
  ```
  ---
  (picture)
  ---

  
