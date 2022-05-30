<?php

namespace App\Models\Layout;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Layout\Layout
 *
 * @property int $id
 * @property string|null $title
 * @property string $icon
 * @property int $type_id
 * @property int $template_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Layout\LayoutPhoto[] $photos
 * @property-read int|null $photos_count
 * @property-read \App\Models\Layout\LayoutTemplate|null $template
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Layout\LayoutText[] $texts
 * @property-read int|null $texts_count
 * @property-read \App\Models\Layout\LayoutRatio|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|Layout newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Layout newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Layout query()
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereTemplateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $ratio_id
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereRatioId($value)
 * @property string $tpl
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereTpl($value)
 */
class Layout extends Model
{
    public function type(): HasOne
    {
        return $this->hasOne(LayoutRatio::class, 'id', 'type_id');
    }

    public function template(): HasOne
    {
        return $this->hasOne(LayoutTemplate::class, 'id', 'template_id');
    }

    public function photos(): HasMany
    {
        return $this->hasMany(LayoutPhoto::class,'layout_id','id');
    }

    public function texts(): HasMany
    {
        return $this->hasMany(LayoutText::class,'layout_id','id');
    }
}
