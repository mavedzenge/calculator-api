# calculator-api

## Project setup
```
clone repository
composer install

php bin/console doctrine:database:create

php bin/console doctrine:migrations:migrate
```

``
You might have to change the database settings in the .env file
``

### Run the dev server
```
symfony server:start --port=8081
```

