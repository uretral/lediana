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

    public function format($slug){
        $this->init();
        $page = $this->getPromoPages($slug);
        return view('formats')->with([
            'page' => $page,
        ]);
    }

    public function editor($slug,$printout_id){
        $this->init();
        return view('editors')->with(['printout_id' => $printout_id]);
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

    private function getPromoPages($slug){
        try {
            return Page::whereSlug($slug)->with('calculator')->first();
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
