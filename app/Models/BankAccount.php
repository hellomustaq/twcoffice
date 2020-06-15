<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    /**
     * The table associated with the Model.
     * @var string
     */
    protected $table = 'bsoft_bank_accounts';

    /**
     * The primary key associated with the table.
     * @var string
     */
    protected $primaryKey = 'bank_id';

    public function user() {
        return $this->belongsTo(User::class, 'bank_user_id', 'id');
    }
}
