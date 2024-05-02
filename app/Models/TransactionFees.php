<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionFees extends Model
{
    use HasFactory;

    protected $table = 'tbl_transaction_fees';
    public $timestamps = false;
    protected $fillable = [
        'min_amt',
        'max_amt',
        'rates',
    ];

    public function getFees($amount){
        $fees = self::all();

        foreach($fees as $fee){
            if($amount >= $fee->min_amt && $amount <= $fee->max_amt){
                return ['id'=>$fee->id, 'rate'=>$fee->rates];
            }
        }

        return ['id' => null, 'rate' => 20];
    }
}
