var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass("app.scss",'public/css', {includePaths: ['bower_components']} )
        .copy('bower_components/bootstrap-sass/assets/fonts/**', 'public/fonts')
        .scripts([
           "jquery/dist/jquery.js",
           "bootstrap-sass/assets/javascripts/bootstrap.js"
        ], 'public/js/vendor.js', 'bower_components')
        .version(['js/vendor.js', 'css/app.css']);
});