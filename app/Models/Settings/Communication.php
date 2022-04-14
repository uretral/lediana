<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Settings\Communication
 *
 * @property int $id
 * @property string $slug
 * @property string|null $title
 * @property string|null $value
 * @property string|null $view_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Communication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Communication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Communication query()
 * @method static \Illuminate\Database\Eloquent\Builder|Communication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Communication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Communication whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Communication whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Communication whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Communication whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Communication whereViewValue($value)
 * @mixin \Eloquent
 */
class Communication extends Model
{}
