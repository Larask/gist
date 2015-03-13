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

var path = {
    bower : 'bower_components/'
};

elixir(function(mix) {
    mix.sass("app.scss",'public/css', {includePaths: ['./bower_components']} )
        .copy( path.bower + 'bootstrap-sass/assets/fonts/**', 'public/fonts')
        .copy( path.bower + 'ace-builds/src-min/**', 'public/js/ace')
        .scripts([
            "jquery/dist/jquery.js",
            "bootstrap-sass/assets/javascripts/bootstrap.js"
        ], "public/js/all.js", "bower_components")
        .scriptsIn("resources/js","public/js/script.js")
        .stylesIn("public/css")
        .version(["js/vendor.js", "js/script.js", "css/all.css"]);
});