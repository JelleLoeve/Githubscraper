<?php


// includes
require 'inc/bladeconfigure.php';
require 'inc/functions.php';
require 'inc/connection.php';

echo $blade->view()->make('layout')->with('html')->render();

