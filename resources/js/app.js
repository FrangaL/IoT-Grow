require('jquery');
require('jquery-form');

try {
    window.$ = window.jQuery = require('jquery');
    window.Popper = require('popper.js').default;
    require('bootstrap');
} catch (e) {}
require('bootstrap4-toggle');

window.toastr = require('toastr');
