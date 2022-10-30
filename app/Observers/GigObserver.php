<?php

namespace App\Observers;

use App\Models\Gig;

class GigObserver
{
    /**
     * Handle the gig "created" event.
     *
     * @param  \App\Models\Gig  $gig
     * @return void
     */
    public function created(Gig $gig)
    {
        info("A new has been created");
    }

    /**
     * Handle the gig "updated" event.
     *
     * @param  \App\Models\Gig  $gig
     * @return void
     */
    public function updated(Gig $gig)
    {
        info("A gig has been updated");
    }

    /**
     * Handle the gig "deleted" event.
     *
     * @param  \App\Models\Gig  $gig
     * @return void
     */
    public function deleted(Gig $gig)
    {
        info("A gig has been deleted");
    }

    /**
     * Handle the gig "restored" event.
     *
     * @param  \App\Models\Gig  $gig
     * @return void
     */
    public function restored(Gig $gig)
    {
        //
    }

    /**
     * Handle the gig "force deleted" event.
     *
     * @param  \App\Models\Gig  $gig
     * @return void
     */
    public function forceDeleted(Gig $gig)
    {
        //
    }
}
