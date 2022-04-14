<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blocks\Advantage
 *
 * @property int $id
 * @property string $page_id
 * @property string|null $text
 * @property string|null $img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Advantage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advantage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advantage query()
 * @method static \Illuminate\Database\Eloquent\Builder|Advantage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advantage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advantage whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advantage wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advantage whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advantage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Advantage extends Model
{
    protected $table = 'block_advantages';
    protected $guarded = [];
}
