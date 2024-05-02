<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'tbl_transactions';
    public $timestamps = false;

    protected $primaryKey = 'id';
    protected $fillable = [
        'reference_number',
        'sender_name',
        'sender_contact',
        'recepient_name',
        'recepient_contact',
        'transaction_type',
        'amount_local_currency',
        'original_currency',
        'currency_conversion_code',
        'amount_converted',
        'transaction_status',
        'branch_sent',
        'branch_received',
        'transfer_fee_id',
        'datetime_transaction'
    ];

    public function convertCurrency($amount, $baseCurrency, $targetCurrency)
    {
        $req_url = 'https://v6.exchangerate-api.com/v6/18956a7733cd5d21ff2b1a60/latest/' . $baseCurrency;
        $response_json = file_get_contents($req_url);

        // Continuing if we got a result
        if (false !== $response_json) {

            // Try/catch for json_decode operation
            try {

                // Decoding
                $response = json_decode($response_json);

                // Check for success
                if ('success' === $response->result) {
                    // YOUR APPLICATION CODE HERE, e.g.
                    $base_price = $amount; // Your price in USD
                    $new_price = round(($base_price * $response->conversion_rates->{$targetCurrency}), 2);
                    return $new_price;
                }

            } catch (Exception $e) {
                // Handle JSON parse error...
            }
        }
    }

    public function branchSent(){
        return $this->belongsTo(BranchProfile::class, 'branch_sent', 'id');
    }

    public function branchReceived(){
        return $this->belongsTo(BranchProfile::class, 'branch_received', 'id');
    }

    public function transactionFee(){
        return $this->belongsTo(TransactionFees::class, 'transfer_fee_id', 'id');
    }

    public function sender(){
        return $this->belongsTo(User::class, 'sender_contact', 'email');
    }

    public function receiver(){
        return $this->belongsTo(User::class, 'recipient_contact', 'email');
    }
}
