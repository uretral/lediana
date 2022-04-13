<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Settings\Communication;

class PageRouteController extends Controller
{

    public function index($slug) {
        $page = Page::whereSlug($slug)->with([
            'promotion',
            'info',
            'about',
            'crossLink.link',
            'galleryTitle',
            'creation',
            'texts'
        ])->first();
        $communications = Communication::all();
        return view($page->type)->with([
            'page' => $page,
            'communications' => $communications,
        ]);
    }
}
