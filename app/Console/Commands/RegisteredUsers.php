<?php

namespace App\Console\Commands;

use App\Jobs\SendEmail;
use App\User;
use Illuminate\Console\Command;

class RegisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia email con la cantidad de usuarios registrados en el dia';

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
     * @return int
     */
    public function handle()
    {
        $hoy = now()->format('Y-m-d');
        $cantidadUsuarios = User::whereDate('created_at', $hoy)->count();
        SendEmail::dispatch('juanjarolin994@gmail.com', $cantidadUsuarios);
    }
}
