<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['equipment_type_id','serial_number', 'comment'];

    public static array $relationships = [
        'type',
    ];

    public function type()
    {
        return $this->belongsTo(EquipmentType::class,'equipment_type_id', 'id');
    }
}
