<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Traits\Settings;

class DashboardController extends Controller
{
    use Settings;

    public function index(){
        $this->init();
        return view('dashboard.index');
    }

    public function drafts() {
        $this->init();
        return view('dashboard.drafts');
    }
    public function sales() {
        $this->init();
        return view('dashboard.sales');
    }
    public function edit() {
        $this->init();
        return view('dashboard.edit');
    }

}
