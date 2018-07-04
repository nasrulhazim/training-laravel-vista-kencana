<?php

namespace App\Listeners\Payroll;

use App\Events\CreatePayrollForEmployee;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Leave
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreatePayrollForEmployee  $event
     * @return void
     */
    public function handle(CreatePayrollForEmployee $event)
    {
        //
    }
}
