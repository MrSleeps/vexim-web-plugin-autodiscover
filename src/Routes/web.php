<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use VEximweb\Plugin\Autodiscover\Http\Controllers\AutodiscoverController;

Route::get('/autodiscover/autodiscover.xml', [AutodiscoverController::class, 'showAutodiscoverXml']);