<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawMail extends Mailable
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
        $walletid =  $this->data['user']->walletid;
        $trans_hash =  $this->data['withdraw']->trans_hash;
        $amount     =  $this->data['withdraw']->amount;
        return $this->from('admin@airlinetrades.com')
            ->subject('Coinminer')
            ->markdown('emails.approve_withdraw')
            ->with(['data' => $data, 'name' => $name,
                'walletid' => $walletid, 'trans_hash' => $trans_hash,'amount' => $amount]);
    }
}
