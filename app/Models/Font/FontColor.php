<?php

namespace App\Models\Font;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Font\FontColor
 *
 * @property int $id
 * @property string $title
 * @property string|null $style
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|FontColor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FontColor newQuery()
 * @method static \Illuminate\Database\Query\Builder|FontColor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FontColor query()
 * @method static \Illuminate\Database\Eloquent\Builder|FontColor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FontColor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FontColor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FontColor whereStyle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FontColor whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FontColor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|FontColor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FontColor withoutTrashed()
 * @mixin \Eloquent
 */
class FontColor extends Model
{
    use SoftDeletes;

    protected $table = 'font_colors';
}
