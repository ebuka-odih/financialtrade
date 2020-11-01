<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestWithdraw extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
      $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data['user'];
        $name =  $this->data['user']->name;
        $btc_wallet =  $this->data['user']->btc_wallet;
        $amount     =  $this->data['withdraw']->amount;
        $payment_method  =  $this->data['withdraw']->payment_method;
        return $this->subject('FTM')
            ->markdown('emails.request_withdraw')
            ->with(['data' => $data, 'name' => $name,
                'btc_wallet' => $btc_wallet, 'amount' => $amount,
                'payment_method' => $payment_method]);
    }
}
