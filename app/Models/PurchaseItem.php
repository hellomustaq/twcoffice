<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $fillable=[
        'item_id',
        'price',
        'vat',
        'quantity',
        'amount',
        'request_code',
        'user_id',
        'status',
        'payment_amount',
        'cartId',
        'status',
        'project_id',
        'item_subtitle'
    ];

    public function userRole(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }


    public function newItemLogs() {
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }

    public function purchaseUser(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function purchaseProject(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Project::class,'project_id','project_id');
    }

    public function subtitle(){
        return $this->belongsTo(ItemSubtitle::class,'item_subtitle','id');
    }

}
