<?php
declare (strict_types=1);

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string uuid
 * @property string email
 * @property string public
 * @property string private
 */
class Configuration extends Model
{
    use SoftDeletes;

    protected $table = 'configuration';
}
