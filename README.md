# simple_project
Simple Product list Project Based on symfony 5 

# Admin Section Using "Easy Admin"
- Login
- Add Product 
- Send Notification after adding product

![Simple project login](https://user-images.githubusercontent.com/7303506/104508051-561a2c80-55f0-11eb-9cf3-a6e8b999e9e0.png)


# Frontend 
- List all the products Sorted by created date from Newest To oldest 
- Adding Pagination (10 pages per page)

# Installation 
##Cloning the project
- git clone git@github.com:PeterBoshra/simple_project.git
- cd simple_project 
- git checkout master 
- git pull origin master 
- composer install 

##Configure your database in .env file 

- php bin/console doctrine:database:create 
- php bin/console doctrine:migrations:migrate

##Setup Admin User 
// Write the password you will use 
- symfony console security:encode-password

##Open Your Sql editor or use command line to insert the first user 

- symfony run psql -c "INSERT INTO admin (id, email,username,roles, password) \
  VALUES (nextval('admin_id_seq'), 'admin', 'admin', '[\"ROLE_ADMIN\"]', \
  '\$argon2id\$v=19\$m=65536,t=4,p=1\$BQG+jovPcunctc30xG5PxQ\$TiGbx451NKdo+g9vLtfkMy4KjASKSOcnNxjij4gTX1s')"
  
  

