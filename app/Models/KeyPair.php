<?php
declare (strict_types=1);

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string domain_id
 * @property string private
 * @property string public
 * @property string uuid
 */
class KeyPair extends Model
{
    use SoftDeletes;

    protected $table = 'keypairs';

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}
