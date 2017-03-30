<?php
declare (strict_types=1);

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property Challenge challenge
 * @property KeyPair   keypair
 * @property string    id
 * @property string    name
 * @property string    uuid
 */
class Domain extends Model
{
    use SoftDeletes;

    protected $with = ['certificates'];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function keypair()
    {
        return $this->hasOne(KeyPair::class);
    }

    public function verifications()
    {
        return $this->hasMany(Verification::class);
    }

    public function challenge()
    {
        return $this->hasOne(Challenge::class);
    }
}
