<?php
declare (strict_types=1);

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configuration extends Model
{
    use SoftDeletes;

    protected $table = 'configuration';
}
