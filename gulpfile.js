const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

//var elixir = require('laravel-elixir');
var bowerFiles = require('main-bower-files');
 
elixir(function(mix) {
    mix.sass(['app.scss', 'custom.scss']);
    mix.scripts(bowerFiles('**/*.js'), 'public/js/3rd-party.js', '/');
	mix.scriptsIn('', 'public/js/app.js');
});