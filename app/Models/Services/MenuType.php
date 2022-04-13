<?php

namespace App\Models\Services;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Services\MenuType
 *
 * @property int $id
 * @property string $title
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Services\Menu[] $menuItems
 * @property-read int|null $menu_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Page[] $pages
 * @property-read int|null $pages_count
 * @method static \Illuminate\Database\Eloquent\Builder|MenuType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuType newQuery()
 * @method static \Illuminate\Database\Query\Builder|MenuType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuType query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|MenuType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|MenuType withoutTrashed()
 * @mixin \Eloquent
 */
class MenuType extends Model
{
    use SoftDeletes;

    protected $table = 'menu_types';
    protected $guarded = [];

    public function menuItems(): HasMany
    {
        return $this->hasMany(Menu::class,'parent_id','id');
    }

    public function pages(): HasManyThrough
    {
        return $this->hasManyThrough(Page::class,Menu::class,'parent_id','id','id','page_id');
    }
}
