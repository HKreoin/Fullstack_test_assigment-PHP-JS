run:
	php -S localhost:8081 -t public_html/

autoload:
	composer dump-autoload

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src routes database

phpstan:
	vendor/bin/phpstan analyse src routes database