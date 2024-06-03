<?php

namespace Modules\Barcode\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori_kuisioner';

	protected $fillable = [
		'kategori',
    ];

    public function barcode(){
        return $this->hasMany(barcode::class,'kategori_id');
    }
}
