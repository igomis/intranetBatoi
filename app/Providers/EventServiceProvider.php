<?php

namespace Intranet\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Intranet\Entities\Activity;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Login' => [
            'Intranet\Listeners\LogLastLogin',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'Intranet\Listeners\UpdateLastLoggedAt',
        ],
        'Intranet\Events\ActividadCreated' => [
            'Intranet\Listeners\ResponsableCreate',
        ],
        'Intranet\Events\GrupoCreated' => [
            'Intranet\Listeners\CoordinadorCreate',
        ],
        'Intranet\Events\ReunionCreated' => [
            'Intranet\Listeners\AsistentesCreate',
        ],
        'Intranet\Events\ActivityReport' => [
            'Intranet\Listeners\RegisterActivity',
        ],
        'Intranet\Events\PreventAction' => [
            'Intranet\Listeners\BlockAction',
        ],
        'Intranet\Events\IncidenciaSaved' => [
            'Intranet\Listeners\MaterialChange',
        ],
        'Intranet\Events\FichaCreated' => [
            'Intranet\Listeners\VeepCreated',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
