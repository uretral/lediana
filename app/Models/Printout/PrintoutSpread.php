<?php

namespace App\Models\Printout;

use App\Models\Item\ItemSpreadColor;
use App\Models\Layout\Layout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Printout\PrintoutSpread
 *
 * @property int $id
 * @property int $printout_id
 * @property int $type_id
 * @property int $color_id
 * @property int $qty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread newQuery()
 * @method static \Illuminate\Database\Query\Builder|PrintoutSpread onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread query()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread wherePrintoutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PrintoutSpread withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PrintoutSpread withoutTrashed()
 * @mixin \Eloquent
 * @property int $spread_nr
 * @property int $__type_id
 * @property int $__color_id
 * @property int $__qty
 * @property-read \App\Models\Printout\Printout|null $printout
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread whereSpreadNr($value)
 * @property int $layout_id
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread whereLayoutId($value)
 * @property-read Layout|null $layout
 * @property int|null $cover_type_id
 * @property int|null $cover_material_id
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread whereCoverMaterialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread whereCoverTypeId($value)
 * @property int $page_color
 * @property-read ItemSpreadColor|null $bg
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread wherePageColor($value)
 * @property int|null $template_id
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpread whereTemplateId($value)
 */
class PrintoutSpread extends Model
{

    protected $table = 'printout_spreads';
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function printout(): BelongsTo
    {
        return $this->belongsTo(Printout::class, 'printout_id', 'id');
    }

    public function layout(): HasOne
    {
        return $this->hasOne(Layout::class, 'id', 'layout_id');
    }

    public function bg(): HasOne
    {
        return $this->hasOne(ItemSpreadColor::class, 'id', 'page_color');
    }

    public function spreadTexts(): HasMany
    {
        return $this->hasMany(PrintoutText::class,'spread_nr','spread_nr');
    }

}
