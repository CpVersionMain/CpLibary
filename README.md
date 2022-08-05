# CpLibary
✅ Cp library Documentation

📝 Description : 

By using this library, you can remotely control the file manager and options of Cpanel
(The library will be updated daily) and new methods will be announced on the channel

Using this library, create a mysql database and even delete it!

📂 Download the library from GitHub :

https://github.com/CpVersionMain/CpLibary

💣 Number Merhods : 7

⚙ Methods :

🔥 CPanel management :

✅ ConnectToServer
✅ CronJobs
✅ DeleteCron
✅ AccountFtp
✅ DelAccountFtp
✅ CreateDatabase
✅ DeleteDatabase

📝 Description :

👉 ConnectToServer :

This method is used to verify the user and password of a cPanel account

🔖 Example of how to use :

<?php

include("CpLibary.php");

$cpanel = new cpanel ();

$res = $cpanel->ConnectToServer([
'domain' => "", //domain
'user' => "", //username
'pass' => "" //password
]);
print $res;
?>

👉 CronJobs :

This method is for setting cron jobs from cPanel

🔖 Example of how to use :

<?php

include("CpLibary.php");

$cpanel = new cpanel ();

$res = $cpanel->CronJobs([
'domain' => "", //domain
'port' => "", //optional
'user' => "", //username
'pass' => "", //password
'command' => "", //command
'day' => "*", //day
'hour' => "*", //hour
'minute' => "*", //minute
'month' => "*", //month
'weekday' => "*" //weekday
]);
print $res;
?>

👉 DeleteCron

There is a way to remove cron job from cPanel

🔖 Example of how to use :

<?php

include("CpLibary.php");

$cpanel = new cpanel ();

$res = $cpanel->DeleteCron([
'domain' => "", //domain
'port' => "", //optional
'user' => "", //username
'pass' => "", //password
'line' => "" //line Cronjobs
]);
print $res;
?>

👉 AccountFtp

It is a method to create an FTP account

🔖 Example of how to use :

<?php

include("CpLibary.php");

$cpanel = new cpanel ();

$res = $cpanel->AccountFtp([
'domain' => "", //domain
'port' => "", //optional
'user' => "", //username
'pass' => "", //password
'username' => "", //username Account
'password' => "", //password Account
'quota' => "", // quota , It is better to be on 2000
'addressdir' => "" //homedir
]);
print $res;
?>

👉 DelAccountFtp

This method is to delete an ftp account

🔖 Example of how to use : 

<?php

include("CpLibary.php");

$cpanel = new cpanel ();

$res = $cpanel->DelAccountFtp([
'domain' => "", //domain
'port' => "", //optional
'user' => "", //username
'pass' => "", //password
'username' => "" //username Account
]);
print $res;
?>

👉 CreateDatabase

This method is for creating a MySQL database

🔖 Example of how to use :

<?php

include("CpLibary.php");

$cpanel = new cpanel ();

$res = $cpanel->CreateDatabase([
'domain' => "", //domain
'port' => "", //optional
'user' => "", //username
'pass' => "", //password
'name' => "" //name database
]);
print $res;
?>

👉 DeleteDatabase

This is the method to remove the MySQL database

🔖 Example of how to use :

<?php

include("CpLibary.php");

$cpanel = new cpanel ();

$res = $cpanel->DeleteDatabase([
'domain' => "", //domain
'port' => "", //optional
'user' => "", //username
'pass' => "", //password
'name' => "" //name database
]);
print $res;
?>

📣 @Cp_Libary
📣 @Documentation_CpLibary
