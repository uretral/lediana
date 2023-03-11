<?php

namespace App\Models\Printout;

use App\Models\Item\ItemSpreadColor;
use App\Models\Layout\Layout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Printout\PrintoutCover
 *
 * @property int $id
 * @property int $printout_id
 * @property int $matetial_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover query()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover whereMatetialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover wherePrintoutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $material_id
 * @property int|null $layout_id
 * @property int|null $color_id
 * @property int|null $size_id
 * @property-read ItemSpreadColor|null $bg
 * @property-read Layout|null $layout
 * @property-read \App\Models\Printout\Printout|null $printout
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover whereLayoutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover whereMaterialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover whereSizeId($value)
 */
class PrintoutCover extends Model
{
    protected $table = 'printout_covers';
    protected $guarded = [];
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function printout(): BelongsTo
    {
        return $this->belongsTo(Printout::class, 'printout_id', 'id');
    }

    public function layout(): HasOne
    {
        return $this->hasOne(Layout::class, 'id', 'layout_id');
    }

    public function material(): HasOne
    {
//        return $this->hasOne(Mate::class, 'id', 'layout_id');
    }

    public function bg(): HasOne
    {
        return $this->hasOne(ItemSpreadColor::class, 'id', 'color_id');
    }

}
