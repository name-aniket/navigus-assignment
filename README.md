# navigus-assignment-1

## Project Description

In this project I develope a simple website where a user can login and view how many other users are viewing the document.
Just like the google docs or google excel sheet works when they are shared among many users.

### Technology
* All the backend APIs are developed in **Php**.
* **MySQL** is used for Database Management.
* **HTML, CSS, Javascript & JQuery** is used to create the front end.
* The server side and client side logic is totally seperated from each other to improve the **maintainability** of the code   and also for **rapid debug and deployment**.   


## Requirements
* Create UI element to show the poeple who are currently viewing the page.
* Should able to see their registered name, avatar, etc on hovering over the avatar.
* Should able to see who all have visited the page in the past and the last timestamp they visited the page.
* Create a basic user registration and authentication system.

## Checks
* The UI page should only be accessed by registered users.
* Show an error page when an unauthenticated user trys to access the page.

## Bonus
* Allow only certain users to access the page.

## Modules present in the project
* Login & Registration
  * Authenticate User
  * Register new User
* View Document
  * Check user permission
  * List currently viewing user
  * List all last viewed user
* Logout

### Login and Registration Modeule

![](https://github.com/name-aniket/navigus-images/blob/master/Screenshot%20from%202020-06-13%2019-02-00.png) 

### View Document

![](https://github.com/name-aniket/navigus-images/blob/master/Screenshot%20from%202020-06-13%2019-25-18.png)
 
### Check User Permission

![](https://github.com/name-aniket/navigus-images/blob/master/Screenshot%20from%202020-06-13%2019-17-46.png)

### List currently viewing user

![](https://github.com/name-aniket/navigus-images/blob/master/Screenshot%20from%202020-06-13%2019-23-34.png)

### List all last viewed user

![](https://github.com/name-aniket/navigus-images/blob/master/Screenshot%20from%202020-06-13%2019-13-13.png)

### Error Page for unauthenticated Users

![](https://github.com/name-aniket/navigus-images/blob/master/Screenshot%20from%202020-06-14%2011-05-27.png)

## Guidelines for database import for testing purpose

* Create a database name `dbNavigusAssignment` in MySQL database
* Run the following command to import the database in `dbNavigusAssignment`
```
mysql -u [username] -p dbNavigusAssignment < data-dump.sql
```
* Change the `config/database.php` with your database `username` and `password`
* `data-dump.sql` is available in the repository

## Guidelines for testing the webapp
* First create a user.

 * The `view permission` and `avatar` is randomly given to each user by the program.So you may find yourself without proper
   permission. In that case you can update the database.

## THANKS
