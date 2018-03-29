<?php

namespace Intranet\Console\Commands;

use Illuminate\Console\Command;
use Intranet\Entities\Profesor;
use Intranet\Entities\Notification;
use Mail;
use Intranet\Mail\ResumenDiario;

class SendDailyEmails extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:Daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resumen mensajes del dia';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $todos = Profesor::all();
        foreach ($todos as $profesor) {
            $notificaciones = Notification::where('notifiable_id', $profesor->dni)
                    ->whereDate('created_at', Hoy())
                    ->whereNull('read_at')
                    ->get();
            // hay que poner email
            if ($notificaciones->count())
                Mail::to($profesor->email, 'Intranet Batoi')->send(new ResumenDiario($notificaciones));
        }
    }

}
