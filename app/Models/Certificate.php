<?php
declare (strict_types=1);

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string certificate
 * @property string domain_id
 * @property string issuer
 * @property string issuerChain
 * @property string serial_number
 * @property string uuid
 * @property string valid_from
 * @property string valid_to
 */
class Certificate extends Model
{
    use SoftDeletes;

    public function domain()
    {
        $this->belongsTo(Domain::class);
    }
}
