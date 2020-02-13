<?php

namespace App\Jobs;

use Mail;
use App\Mail\ScheduleMail;
use App\Models\ScheduledEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ScheduleEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ScheduledEmail $email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $from_email = $this->email['from_email'];
        $from_name = $this->email['from_name'];
        $to_name = $this->email['to_name'];
        $message = $this->email['message'];
        
        Mail::to($this->email['to_email'])->send(new ScheduleMail(
            $from_email, $from_name, $to_name, $message
        ));
    }
}
