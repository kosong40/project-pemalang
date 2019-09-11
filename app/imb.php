<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imb extends Model
{
    protected $table = 'izin-mendirikan-bangunan';
    protected $guarded  = ['id'];
    public function pemohon()
    {
        return $this->belongsTo('App\Pemohon');
    }
}
