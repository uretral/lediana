<?php

namespace App\Observers;

use App\Models\Printout\Printout;
use App\Models\Printout\PrintoutSpread;

class PrintoutObserver
{
    /**
     * Handle the Printout "created" event.
     *
     * @param  \App\Models\Printout\Printout  $printout
     * @return void
     */
    public function created(Printout $printout)
    {
        //
    }

    /**
     * Handle the Printout "updated" event.
     *
     * @param  \App\Models\Printout\Printout  $printout
     * @return void
     */
    public function updated(Printout $printout)
    {
/*        try {
            PrintoutSpread::updateOrCreate(['printout_id' => $printout->id,'spread_nr' => $printout->current_spread]);
        } catch (\Exception $e) {
            dd($e);
        }*/
//        dd($printout);
    }

    /**
     * Handle the Printout "deleted" event.
     *
     * @param  \App\Models\Printout\Printout  $printout
     * @return void
     */
    public function deleted(Printout $printout)
    {
        //
    }

    /**
     * Handle the Printout "restored" event.
     *
     * @param  \App\Models\Printout\Printout  $printout
     * @return void
     */
    public function restored(Printout $printout)
    {
        //
    }

    /**
     * Handle the Printout "force deleted" event.
     *
     * @param  \App\Models\Printout\Printout  $printout
     * @return void
     */
    public function forceDeleted(Printout $printout)
    {
        //
    }
}
