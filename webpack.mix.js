const mix = require('laravel-mix');
const notifier = require('node-notifier');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.disableNotifications();

// Configurer explicitement node-notifier
mix.then(() => {
    notifier.notify = function (options, callback) {
        // Personnalisez les options si nécessaire
        options.icon = 'path/to/your/icon.png';
        options.appID = 'YourAppName'; // Assurez-vous de définir un ID d'application approprié

        return new Promise((resolve, reject) => {
            notifier.notify(options, (err, response) => {
                if (callback) {
                    callback(err, response);
                }

                if (err) {
                    reject(err);
                } else {
                    resolve(response);
                }
            });
        });
    };
});

// ... le reste de votre configuration Laravel Mix



