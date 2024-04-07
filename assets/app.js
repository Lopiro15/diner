/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import {runInputmask} from "./js/inputmark";

require('inputmask');

require('select2/dist/css/select2.css');
require('select2-bootstrap-theme/dist/select2-bootstrap.css');

require('select2/dist/js/select2.full')

$('select.select2').select2({width: '100%'});

import toastr from 'toastr';
global.toastr = toastr;


runInputmask();