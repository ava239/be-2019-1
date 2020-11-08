install:
	composer install

lint:
	composer run-script phpcs -- --standard=PSR12 src tests

test:
	composer test

test-coverage:
	composer test -- --coverage-clover build/logs/clover.xml