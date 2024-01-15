reset:
	php artisan migrate:fresh
	php artisan db:seed

cron:
	php artisan schedule:test

backend_test:
	php artisan test
