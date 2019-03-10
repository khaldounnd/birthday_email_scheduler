# birthday_email_scheduler

Please adhere to the following steps to get the project running.

- composer install
- php artisan vendor:publish
- fill the .env file with correct email and DB data
- php artisan migrate --seed
- php artisan serve

User:
email: khaldoun@mail.com
password: password

From here there are two ways to proceed. This program supports calling an API that sends an email using a PHP script or sending an email by running the Laravel Scheduler.
I made this readme for a windows based server or PC but it can be adapted for Linux or other OS.
For everything to work you must have filled some data into the employees table using the interface.

To use the API:
- unzip the CRONWindowsFiles file and place the files in an accessible location.
- modify the $service_url variable to direct it at your server.
- modify the cron.bat file as fitting.
- create a new basic task in the task scheduler and set it to run daily at your preferred time.
- Use the start a program option and add the location of the .bat file you extracted in the Program/script field( i provided a BirthdayScheduler.xml file in CronXMLs.zip file that you can use as reference) 
- Either wait for the scheduler to run or try running it manually yourself.

To use the Laravel scheduler:
- create a new basic task in the task scheduler and set it to run daily at your preferred time.
- add the path to your php.exe to the Program/script field
- add the following to the arguments field: <path to project>\artisan schedule:run
- Either wait for the scheduler to run or try running it manually yourself.

