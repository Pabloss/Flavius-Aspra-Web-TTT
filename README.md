# Flavius-Aspra-Web-TTT


The app is a browser version of **Tit Tac Toe**.

As backend it uses `zend-expressive`. 
Browser connects to backend by `$http` Angular JS service.
You need:
* Headless mode in Google Chrome Browser - for testing
* installed:
    * phpunit - as executable (from: https://phpunit.de)
    * composer (from: https://getcomposer.org)

To install: run `composer -vvv install`

To run test:
1. run `bin/serve`
2. run `phpunit`

After `bin/serve` you can access the application from browser on `http://localhost:8080` url too.
The url of: `http://localhost:9222` is used for headless browser testing.