# VueJs-Laravel-TodoApp
Todo App - VueJs2 + Laravel 5.7

![2018-11-25](https://firebasestorage.googleapis.com/v0/b/look24-notification.appspot.com/o/Vue-Laravel-Todo.gif?alt=media&token=6627efb9-d2af-415b-aae1-13da71b1a743)


## Install npm 
```batch
npm install
```

## update composer dependencies
```batch
composer update
```

# create a .env file
cp .env.example .env

## run the migration files to generate the schema
```batch
php artisan migrate
```

## install VueJs component (vuex, vue-router, validate.js)
```batch
npm install --save vuex vue-router validate.js
```

## generate a key for your application
```batch
php artisan key:generate
```

## Clear cache
```batch
php artisan config:clear
```

## Create cache
```batch
php artisan config:cache
```

## Start server
```batch
php artisan serve
```

## run watch for changes
```batch
npm run watch
```