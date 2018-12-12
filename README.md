## INTRODUCTION
VERTT is an intelligent advisement system that advise students on classes to take based on questionnaires answered.

## INSTALLATION MANUAL
The VERTT Intelligent system can be installed in various ways depending on the type of operating system it will be hosted on.

We will be focusing on the Windows operating system installation.

#### Windows Operating System Installation.

To use the system on a windows operating system, you will need to install a windows server such as the WAMPSERVER etc. on your system. The server application consist of the Apache server, MySQL database and PHP. Follow the subsequent steps:
1)	Go to the [WAMPSERVER](http://www.wampserver.com/en/) site 
2)	Click the download button based on your system version (i.e WAMPSERVER 64 bits for x64 system and WAMPSERVER 32 BITS for x86 system)
3)	Install the application when the download is completed
4)	Run the application.
5)	Open your browser (Chrome, Firefox etc)
6)	Enter `localhost` in the browser address bar
7)	Download the VERTT Source code
8)	If you don’t have access to the VERTT Source code, you can download it from https://github.com/Temilol/VERTT.git
9)	Extract the downloaded VERTT file
10)	Copy the extracted VERTT file and paste in either of the directory below
            `C:\wamp\www\		or		C:\wamp64\www\`
11)	Open the browser and Enter `localhost` in the browser address bar
12)	Click phpmyadmin under Tools
13)	If asked for credentials, enter root as the username and leave password blank.
14)	Create a new database with `id6870583_vertt` as the name.
15)	Open the database folder founded under the extracted VERTT folder
16)	Import `Vertt_Database.sql` from database folder into phpmyadmin
17)	Open the browser and Enter `localhost/vertt/` in the browser address bar
18)	Click on the `login.html` page and you should get an image like below

 For other operating system, you have to download its respective server such as LAMP for Linux, MAMP for MacOS.
 
 The system can also be setup on codio (an online server).
 
 To use that platform, create an account with codio, create a new project with the LAMP stack, and import the VERTT project.
 
 You will also need to import the MySQL database (Vertt_Database.sql) located in the database folder via the codio terminal.