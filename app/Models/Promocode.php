<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Promocode
 *
 * @property int $id
 * @property string $active
 * @property string|null $promocode
 * @property string|null $discount
 * @property string|null $min_cost
 * @property string|null $is_personal
 * @property string|null $user_id
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode query()
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode whereIsPersonal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode whereMinCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode wherePromocode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode whereUserId($value)
 * @mixin \Eloquent
 */
class Promocode extends Model
{}
