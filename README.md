# apiusers

## A WordPress plugin made for Inpsyde job aplication

### Install using ```composer```

1. Open console
2. Open plugins folder of WP installation ```https://yourwebsite.com/wp-content/plugins```
3. Run ```git clone https://github.com/sebastopolys/apiusers/```
4. Enter apiusers plugin folder  ```https://yourwebsite.com/wp-content/plugins/apiusers```
5. Run ```composer install```
6. Run ```composer update``` if necessary


### Endpoint:
The default Endpoint is named like the plugin name: ```apiusers```

There is no link supplied on the frontend, just access by typing the endpoint after website URL. Or place a link anywere on the frontend
```https://yourwebsite.com/apiusers```


### PHP Code Sniffer / Inpsyde standards

Use ```vendor/bin/phpcs --standard="Inpsyde"  <path-file>``` to run on single files

### Testing

[phpunit](https://phpunit.de/) is ready to use, 

### Backend

Some bakcend options are included on the WP admin dashboard.

The WP settings API was used.

- Customize Endpoint: Allows to edit the default endpoint.
- View: Displays integrated with theme or removing header & footer
- Credits: Hide / Display credits below table
