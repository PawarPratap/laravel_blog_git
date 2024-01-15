
import "@popperjs/core";
window.$ = window.jQuery = require("jquery");
window.bootstrap = require("bootstrap");

window.$(document).ready(function(){

    console.log("ready!");

    window.$("span").click(function () { 
        let url = window.$(this).attr("onclick");
        console.log(url);
        window.location.href = url;
    });
    
});



