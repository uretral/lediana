<?php

namespace App\Models\Printout;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Printout\PrintoutPage
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutPage query()
 * @mixin \Eloquent
 */
class PrintoutPage extends Model
{
    use HasFactory;
    protected $hidden = ['created_at','updated_at','deleted_at'];
}
