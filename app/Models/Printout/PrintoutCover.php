<?php

namespace App\Models\Printout;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Printout\PrintoutCover
 *
 * @property int $id
 * @property int $printout_id
 * @property int $type_id
 * @property int $matetial_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover query()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover whereMatetialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover wherePrintoutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutCover whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PrintoutCover extends Model
{
    protected $table = 'printout_covers';
    protected $hidden = ['created_at','updated_at','deleted_at'];
}
