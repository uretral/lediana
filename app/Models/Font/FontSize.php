<?php

namespace App\Models\Font;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Font\FontSize
 *
 * @property int $id
 * @property string $title
 * @property string|null $style
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FontSize newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FontSize newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FontSize query()
 * @method static \Illuminate\Database\Eloquent\Builder|FontSize whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FontSize whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FontSize whereStyle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FontSize whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FontSize whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FontSize extends Model
{
    protected $table = 'font_sizes';
}
