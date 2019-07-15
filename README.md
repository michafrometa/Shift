
composer install
npm install
php artisan vendor:publish --provider="MartinLindhe\VueInternationalizationGenerator\GeneratorProvider"

It's a shame [laravel-vue-i18n-generator](https://github.com/martinlindhe/laravel-vue-i18n-generator) don't support [pluralization](https://laravel.com/docs/5.8/localization#pluralization)  

php artisan vue-i18n:generate