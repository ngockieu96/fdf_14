const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.copy('resources/assets/sass/admin.scss', 'public/css/admin.css');
    mix.copy('resources/assets/sass/user.scss', 'public/css/user.css');
    mix.copy('resources/assets/js/cart.js', 'public/js/cart.js');
    mix.copy('resources/assets/js/comment.js', 'public/js/comment.js');
})
