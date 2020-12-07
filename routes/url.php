<?php

Route::add(array('GET', 'POST'), '/', 'Forum@home');
Route::add(array('GET', 'POST'), '/[int]', 'Forum@section');
Route::add(array('GET', 'POST'), '/[int]/[int]', 'Forum@post');
Route::add(array('GET', 'POST'), '/login', 'User@login');