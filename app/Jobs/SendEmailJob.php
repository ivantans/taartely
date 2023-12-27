<?php

namespace App\Jobs;

use App\Mail\SellerDonePayment;
use App\Mail\SellerNewOrder;
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
            case 'SendNewOrder':
                Mail::to("ivantanjaya77@gmail.com")->send(new SellerNewOrder($this->model));
                break;

            case 'SendDonePayment':
                Mail::to("ivantanjaya77@gmail.com")->send(new SellerDonePayment($this->model));
                break;


            // ... tambahkan jenis email lainnya sesuai kebutuhan

            default:
                // Logika default jika tipe email tidak dikenali
                break;
        }
    }
}
