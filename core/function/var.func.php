<?php

function var_get($get) {return (isset($_GET[$get])) ? $_GET[$get] : false;}
function var_post($post) {return (isset($_POST[$post])) ? $_POST[$post] : false;}
