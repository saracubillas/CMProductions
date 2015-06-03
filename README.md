# CMProductions

#Set up PHP dependencies

curl -sS https://getcomposer.org/installer | php
php composer.phar install

#Run the test
php bin/phpunit

#Execute Commands

php bin/console  import:video glorf
php bin/console  import:video flub
