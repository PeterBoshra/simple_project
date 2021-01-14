# simple_project
Simple Product list Project Based on symfony 5 

# Admin Section Using "Easy Admin"
- Login
- Add Product 
- Send Notification after adding product

![Simple project login](https://user-images.githubusercontent.com/7303506/104508051-561a2c80-55f0-11eb-9cf3-a6e8b999e9e0.png)
![Product](https://user-images.githubusercontent.com/7303506/104508219-937eba00-55f0-11eb-8df1-20db3fb02fbe.png)


# Frontend 
- List all the products Sorted by created date from Newest To oldest 
- Adding Pagination (10 pages per page)

# Installation 

## Cloning the project
- git clone git@github.com:PeterBoshra/simple_project.git
- cd simple_project 
- git checkout master 
- git pull origin master 
- composer install 

## Configure your database in .env file 

- php bin/console doctrine:database:create 
- php bin/console doctrine:migrations:migrate

## Adding Fixtures 
php bin/console doctrine:fixtures:load  

## Default Login User 

- Email : admin@admin.com
- Password : peter
  
## Using Symfony Server:run 

`symfony server:start`
`http://127.0.0.1:8000/login`

## Using Gmail to send verification email 
- MAILER_URL=gmail://XXXX:****@default

