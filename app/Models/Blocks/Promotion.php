<?php

namespace App\Models\Blocks;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use SoftDeletes;

    protected $table = 'block_promotions';

//    public function page(): BelongsTo{
//        return $this->belongsTo(Page::class,'promotion_id','id');
//    }
}
