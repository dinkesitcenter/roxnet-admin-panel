<?php

namespace Modules\Barcode\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    use HasFactory;
    protected $table = 'barcode';

    // protected $casts = [
	// 	'bidang_id' => 'integer',
	// 	'kategori_id' => 'integer',
	// 	'name' => 'string',
	// 	'link' => 'string',
	// 	'created_at' => 'timestamp',
	// 	'updated_at' => 'timestamp'
	// ];

	protected $fillable = [
		'bidang_id',
		'kategori_id',
		'name',
		'link',
	];

	public function bidang(){
		return $this->belongsTo(Bidang::class,'bidang_id');
	}

	public function kategori(){
		return $this->belongsTo(Kategori::class,'kategori_id');
	}
}
