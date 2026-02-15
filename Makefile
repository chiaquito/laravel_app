.PHONY: test

test:
	cd src && ./vendor/bin/phpunit --testdox
