var gulp = require('gulp');
var elixir = require('laravel-elixir');

elixir(function(mix) {
    // Copy fonts straight to public
    mix.copy('resources/vendor/bootstra.386/dist/fonts/bootstrap/**', 'public/fonts');
    mix.copy('resources/vendor/font-awesome/fonts/**', 'public/fonts');
    // Copy images straight to public
    mix.copy('resources/vendor/jquery-colorbox/example3/images/**', 'public/css/images');
    mix.copy('resources/vendor/jquery-ui/themes/base/images/**', 'public/css/images');
    // Copy flag resources
    mix.copy('resources/vendor/flag-sprites/dist/css/flag-sprites.min.css', 'public/css/flags.css');
    mix.copy('resources/vendor/flag-sprites/dist/img/flags.png', 'public/img/flags.png');
    mix.styles([
        'docs.css',
        'bootstrap.css',
        'prettify.css',
        'offcanvas.css'
    ]);

    mix.scripts([
        "jquery.js",
        "bootstrap-386.js",
        "bootstrap-transition.js",
        "bootstrap-alert.js",
        "bootstrap-modal.js",
        "bootstrap-dropdown.js",
        "bootstrap-scrollspy.js",
        "bootstrap-tab.js",
        "bootstrap-tooltip.js",
        "bootstrap-popover.js",
        "bootstrap-button.js",
        "bootstrap-collapse.js",
        "bootstrap-carousel.js",
        "bootstrap-typeahead.js",
        "bootstrap-affix.js",
        "holder/holder.js",
        "google-code-prettify/prettify.js",
        "application.js"
    ]);
});
