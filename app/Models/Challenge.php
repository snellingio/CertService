<?php
declare (strict_types=1);

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property Domain domain
 * @property string domain_id
 * @property string payload
 * @property string token
 * @property string url
 * @property string type
 * @property string uuid
 */
class Challenge extends Model
{
    use SoftDeletes;

    public function domain()
    {
        $this->belongsTo(Domain::class);
    }
}
