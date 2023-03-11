<?php

namespace App\Models\Printout;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Printout\PrintoutAttribute
 *
 * @property int $id
 * @property string $printout_id
 * @property string $printout_spread_id
 * @property string $attribute_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Printout\PrintoutSpread|null $attributes
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpreadAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpreadAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpreadAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpreadAttribute whereAttributePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpreadAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpreadAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpreadAttribute wherePrintoutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpreadAttribute wherePrintoutSpreadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpreadAttribute whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $attribute_id
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutSpreadAttribute whereAttributeId($value)
 */
class PrintoutSpreadAttribute extends Model
{
    protected $table = 'printout_spread_attributes';
    protected $guarded = [];


}
