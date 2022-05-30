<?php

namespace App\Models\Font;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Font\FontName
 *
 * @property int $id
 * @property string $title
 * @property string $style
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FontName newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FontName newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FontName query()
 * @method static \Illuminate\Database\Eloquent\Builder|FontName whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FontName whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FontName whereStyle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FontName whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FontName whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FontName extends Model
{
    protected $table = 'font_names';
}
