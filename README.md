# apiusers

## A WordPress plugin made for Inpsyde job aplication

### Install using ```composer```

1. Open console
2. Open plugins folder of WP installation ```https://yourwebsite.com/wp-content/plugins```
3. Run ```git clone https://github.com/sebastopolys/apiusers/```
4. Enter apiusers plugin folder  ```https://yourwebsite.com/wp-content/plugins/apiusers```
5. Run ```composer install```
6. Run ```composer update``` if necessary
7. Activate plugin from WP admin dashboard


### Endpoint:
The custom Endpoint is named like the plugin name: ```apiusers```

There is no link supplied on the frontend, just access by typing the endpoint after website URL. Or place a link anywere on the frontend

```https://yourwebsite.com/apiusers```

### PHP Code Sniffer / Inpsyde Standards

run from console  ```vendor/bin/phpcs --standard="Inpsyde" <file path>```

## Unit testing

phpunit framework is available to run from console. 
```vendor/bin/phpunit <test file>```

