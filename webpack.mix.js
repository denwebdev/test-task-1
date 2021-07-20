const mix = require('laravel-mix');

mix.sass('resources/sass/app.sass', 'public/assets/css');

mix.inProduction() && mix.version();
