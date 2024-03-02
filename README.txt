DP Base React Theme v1.0 GUIDE
=================================
New DP wordpress projects should start from this theme.

Features:
- React/Headless (Rest API)  or ACF/Gutenberg custom Home page template
- Yarn packages https://yarnpkg.com
- Working with DP plugin https://github.com/The-Fuel-Agency/dp-wp-blocks


1. Before run this theme for new project:
    1.1 First need to add & run plugin ACF Pro: https://www.advancedcustomfields.com/pro/ & later use https://github.com/StoutLogic/acf-builder
    1.2 Clone https://github.com/The-Fuel-Agency/dp-base-react
    1.3 For Gutenberg Block customization DP plugin https://github.com/The-Fuel-Agency/dp-wp-blocks-react

3. Run "composer install" - if Win then https://getcomposer.org/download/ - Download and run Composer-Setup.exe (all default setting only need to check any localhost php.ini) 
    - after success instalation and run will be composer.lock & new dir "vendor"

3. Run "yarn install" - you can add more needed packages https://yarnpkg.com
   Run "yarn run start" and all will be built and ready (package-lock.json and new dir "dist" npm & Laravel Mix https://laravel-mix.com)
    => now you can run wp-admin new Theme and to start development

Bootstrap 5 - https://getbootstrap.com/docs/5.1/layout/grid/ (NPM: https://www.npmjs.com/package/bootstrap/v/5.0.1)

------------------------
Recomended extra plugins:
- https://wordpress.org/plugins/duplicate-page/
- https://en-gb.wordpress.org/plugins/all-in-one-wp-migration/
- https://wordpress.org/plugins/simple-custom-post-order/
- https://en-gb.wordpress.org/plugins/redirection/

* When project ready for live need to run "yarn run prod" - JS & CSS dist directory will be minified and then need to check speed test for desktop & mobile https://developers.google.com/speed/pagespeed/insights/