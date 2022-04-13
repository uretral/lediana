<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Services\PageType
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|PageType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageType newQuery()
 * @method static \Illuminate\Database\Query\Builder|PageType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PageType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PageType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PageType withoutTrashed()
 * @mixin \Eloquent
 */
class PageType extends Model
{
    use SoftDeletes;

    protected $table = 'page_types';
}
