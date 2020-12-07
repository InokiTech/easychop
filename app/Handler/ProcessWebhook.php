<?php
    namespace App\Handler;

use Illuminate\Support\Facades\Storage;
use \Spatie\WebhookClient\ProcessWebhookJob;
// use App\Order;
use App\User;
// use App\Mail\TransactionNotification;
use Illuminate\Support\Facades\Mail;
    //The class extends "ProcessWebhookJob" class as that is the class //that will handle the job of processing our webhook before we have //access to it.
class ProcessWebhook extends ProcessWebhookJob
{
    // public $transaction;

    public function handle(){
        file_put_contents(storage_path('oya.txt'),'Hekkoooooooo ProcessFile');

        $payload = json_decode($this->webhookCall, true);
        $data = $payload['payload'];
        logger($data);

        return http_response_code(200); //Acknowledge you received the response

            // if($data['data']['metadata']['type']=='order'){
            //     $status = $this->prcessOrder($data);
            //     if($status){
            //         return http_response_code(200); //Acknowledge you received the response
            //     }else{
            //         return http_response_code(500);
            //     }
            // }

            // if($data['data']['metadata']['type']=='deposit'){
            //     $status = $this->processDeposit($data);
            //     if($status){
            //         return http_response_code(200); //Acknowledge you received the response
            //     }else{
            //         return http_response_code(500);
            //     }
            // }

            return http_response_code(500); //Acknowledge you received the response
        }

        // private function prcessOrder($payload){

        //     if($payload){
        //         $order = Order::find($payload['data']['metadata']['order_id']);
        //         $order->status = 'paid';
        //         $order->is_paid = 1;
        //         $order->save();
        //         // Mail::to([$order->receiver_email, $order->user->email])->send(new TransactionNotification($transact));
        //         return true;
        //     }

        //     return false;
        // }

        // private function processDeposit($payload)
        // {
        //     // if($payload){
        //     //     $user = User::find($payload['data']['metadata']['user_id']);
        //     //     $user->wallet->balance = $payload['data']['amount'] + $user->wallet->balance;
        //     //     $user->wallet->save();
        //     //     $user->wallet->orders()->where('reference', $payload['data']['reference'])->update(['status' => 'successful']);
        //     //     return true;
        //     // }
        //     // return false;
        }
}
