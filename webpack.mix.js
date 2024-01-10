const mix = require("laravel-mix"); 

mix.styles(
    [
        "resources/css/app.css",
    ],
    "public/css/app.css"
).version();

mix.js(
    [
        "resources/js/app.js"
    ],
    "public/js/app.js"
).version();