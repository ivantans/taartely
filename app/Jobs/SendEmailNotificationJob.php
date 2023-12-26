<?php

namespace App\Jobs;

use App\Mail\SendEmailNotification;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     */
    public function __construct(protected Order $order)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = new SendEmailNotification($this->order);
        Mail::to("ivantanjaya77@gmail.com")->send($email);

    }
}
