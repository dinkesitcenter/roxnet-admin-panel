<?php

namespace Modules\Barcode\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;
    protected $table = 'bidang';

	protected $fillable = [
		'bidang',
		'keterangan',
    ];

    public function barcode(){
        return $this->hasMany(barcode::class,'bidang_id');
    }
}
