<strong>Hello Doctor <strong> <p>  is a simple academic web App that allow user to take appointment at a <strong>Docter  </strong> 's office , and the doctor can see his list of patients.
</p><br>
<p> it's not that big application to count on 
## Incomplete Tasks 
- There is a bug in security where i can't sepearate security by rules to unroganized functions.
- There is also a small bug where i access to the user data with a query function instead of double relation between The "Rendezvous" and the "Doctor".
- .. other incomplete tasks 

<strong> i forget to mention that this is my first time coding in symfony and this app was realized in small period of time so no judgment</strong>

## Technologies
Project is created with:
* symfony : 5.1.2
* fontawesome: v5.0.8
* Bootstrap : 4.3
	
## Setup
To run this project, install it locally using Composer :

```
$ git clone https://github.com/Hamza119612/Hello_Doc
$ cd Hello_Doc 
$ composer install 
$ php bin/console doctrine:database:create // to create the database "hellodoctor"
$ php bin/console doctrine:update:schema --force // to create all the tables in entity folder
$ localhost:8080/admin/new                      // to create a new unique admin 
$symfony serve 
```
## Some Screen Captures 
<img src="https://i.postimg.cc/hjhPvS98/tesss.png" alt="Homescreen">
<img src="https://i.postimg.cc/MpVKXCw9/2.png" alt="RegisterPage">
