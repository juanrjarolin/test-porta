<?php

namespace App\Jobs;

use App\Mail\EmailQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $cantidadUsuarios;
    protected $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $cantidadUsuarios)
    {
        $this->cantidadUsuarios = $cantidadUsuarios;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new EmailQueue($this->cantidadUsuarios);
        Mail::to($this->email)->send($email);
    }
}
