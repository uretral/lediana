<?php

namespace App\Models\Blocks;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CrossLink extends Model
{
    protected $table = 'block_cross_links';
    protected $guarded = [];

    public function link(): HasOne{
        return $this->hasOne(Page::class,'id','link_page');
    }
}
