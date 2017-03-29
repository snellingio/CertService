<?php
declare (strict_types = 1);

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{
    use SoftDeletes;

    public function domain()
    {
        $this->belongsTo(Domain::class);
    }
}
