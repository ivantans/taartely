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
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected $emailTpye, protected $model)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        switch ($this->emailTpye) {
            case 'seller':
                Mail::to("ivantanjaya77@gmail.com")->send(new SendEmailNotification($this->model));
                break;

            // case 'buyer':
            //     Logika pengiriman email untuk pembeli
            //     Mail::to($this->data['buyerEmail'])->send();
            //     break;


            // ... tambahkan jenis email lainnya sesuai kebutuhan

            default:
                // Logika default jika tipe email tidak dikenali
                break;
        }
    }
}
