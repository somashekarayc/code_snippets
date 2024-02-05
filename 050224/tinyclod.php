composer create-project laravel/laravel my-example-app

npm install
composer require tinymce/tinymce

Add a Laravel Mix task to copy TinyMCE to the public files when Mix is run, such as:
File: webpack.mix.js
mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');