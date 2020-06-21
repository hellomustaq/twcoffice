<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\MotherCategory;

class InventoryManagement extends Model
{
    protected $fillable =[
        'mother_category_id','category_id','sub_category_id','manufacture_id','item_name','item_unit','item_price','item_reusable','item_image'
    ];

    public function requestItem(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RequestItem::class);
    }

    public function subtitles(){
        return $this->hasMany(ItemSubtitle::class);
    }

    public function motherCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(MotherCategory::class,'mother_category_id');
    }
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function subCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }

    public function manufacture(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Manufacture::class);
    }


}
