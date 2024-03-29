<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Layout\Layout;
use App\Models\Page;
use App\Models\Printout\Printout;
use App\Services\PrintoutService;
use App\Traits\Settings;
use Inertia\Inertia;

class PageRouteController extends Controller
{
    use Settings;

    public function index($slug)
    {
        $this->init();
        $page = $this->getPage($slug);
//        dump('dfsdf', $page);
        return view($page->type)->with([
            'page' => $page,
        ]);
    }

    public function format($slug)
    {
        $this->init();
        $page = $this->getPromoPages($slug);
        return view('formats')->with([
            'page' => $page,
        ]);
    }

    public function editor($slug, $printout_id, PrintoutService $service)
    {
        $this->init();
        return view('editors')->with(['service' => Printout::find($printout_id)]);
    }

    public function editorInertia($slug, $printout_id, PrintoutService $service)
    {
        $this->init();
        return Inertia::render('Photobook',[
            'service' => $service->get($printout_id)->toArray()
        ]); // ->with(['service' => Printout::find($printout_id)])
    }


    private function getPage($slug)
    {
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

    private function getPromoPages($slug)
    {
        try {
            return Page::whereSlug($slug)->with('calculator')->first();
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
