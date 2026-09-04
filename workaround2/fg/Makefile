# create a zip package of the function code for deployment
# based on composer.json archive settings
create_package:
	composer install --no-dev --prefer-dist
	composer archive --format=zip --file=code
	composer install