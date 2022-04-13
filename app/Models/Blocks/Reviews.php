<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blocks\Reviews
 *
 * @property int $id
 * @property int $order
 * @property string $active
 * @property string|null $text
 * @property int|null $product_id
 * @property string|null $user
 * @property string|null $avatar
 * @property int $rate
 * @property string|null $product_img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Reviews newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reviews newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reviews query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reviews whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reviews whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reviews whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reviews whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reviews whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reviews whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reviews whereProductImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reviews whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reviews whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reviews whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reviews whereUser($value)
 * @mixin \Eloquent
 */
class Reviews extends Model
{
    protected $table = 'block_reviews';
    protected $guarded = [];
}
