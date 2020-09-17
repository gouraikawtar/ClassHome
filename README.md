# Get started

## Contributors
[Salma BOUAOUID](https://github.com/sbouaouid)<br>
[Kawtar GOURAI](https://github.com/gouraikawtar)
## Clone the project
```
git clone url
```
## Install dependencies
* Composer **(If you don't have it already)**<br>
Download and install **Composer**<br>
[Download Composer](https://getcomposer.org/download/ "Link to download page")<br>
* Npm package **(To run laravel mix)**<br>
Download and install **Node.js**<br>
[Download Node.js](https://nodejs.org/en/download/ "Link to download page")<br>
Then run the following command
````
npm install
````
* Bootstrap<br>
````
npm install boostrap
````
* jQuery<br>
````
npm install jquery
```` 
*  Pooper.js<br>
````
npm install popper.js
````
## Edit .env file
1. Rename **.env.example** to **.env**
1. Configure your **Database parameters**
1. Change the parameter **APP_NAME** from Laravel to **ClassHome**
## Migrate your Database
````
php artisan migrate
````
## Generate Application Key
````
php artisan key:generate
````
## Run Laravel Mix
````
npm run dev
````
## Run Server
````
php artisan serve
````