<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Traits\Settings;

class PageRouteController extends Controller
{
    use Settings;

    public function index($slug) {
        $this->init();
        $page = $this->getPage($slug);
        return view($page->type)->with([
            'page' => $page,
        ]);
    }
    private function getPage($slug){
        try {
            return Page::whereSlug($slug)->with([
                'promotion',
                'info',
                'about',
                'crossLink.link',
                'galleryTitle',
                'creation',
                'texts',
                'calculator',
            ])->first();
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
