## Laravel Version
    8.0

## PHP Version
    7.4

## Composer version
    2.0

## Custom commands
    php artisan init

##Instructions for deployment
- make sure you have the correct versions to run this project
- git clone https://github.com/LuisVega91/serempreLaravelTest
- cd serempreLaravelTest
- composer install
- create file .env
- configure this file based on .env.example
  - configure DB section
  - configure APP_URL
- run command:`php artisan init` to set default configurations and data
- go to `/admin` to see the voyager admin panel with credentials:
   
   > username = admin@admin.com <br>
   > password = password

- or go to `/login` to see the normal users panel with credentials
  > username = user@user.com <br>
  > password = password
