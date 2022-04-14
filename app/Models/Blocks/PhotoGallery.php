<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blocks\PhotoGallery
 *
 * @property int $id
 * @property int $page_id
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoGallery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PhotoGallery extends Model
{
    protected $table = 'block_photo_gallery';
    protected $guarded = [];
}
