<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Route;
use Unsplash;

class IndexController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'hero_photo' => Unsplash::photo('R1L_eralFEU')->toArray()['urls']['regular'],
            'page_title' => __('index.welcome'),
        ]);
    }
}
