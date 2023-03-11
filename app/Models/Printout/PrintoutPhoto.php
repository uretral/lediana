<?php

namespace App\Models\Printout;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Printout\PrintoutPhoto
 *
 * @property int $id
 * @property int $printout_id
 * @property int|null $layout_id
 * @property int|null $spread_nr
 * @property string|null $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto query()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto whereLayoutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto wherePrintoutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto whereSpreadNr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $layout_photo_id
 * @property int|null $photo_id
 * @property string|null $html
 * @property mixed|null $crop_data
 * @property array|null $cropper
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto whereCropData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto whereCropper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto whereHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto whereLayoutPhotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto wherePhotoId($value)
 * @property int|null $spread_id
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPhoto whereSpreadId($value)
 */
class PrintoutPhoto extends Model
{
    protected $table = 'printout_photos';
    protected $hidden = ['created_at','updated_at','deleted_at'];
    protected $guarded = [];
    protected $casts = [
        'cropper' => 'array'
    ];
}
