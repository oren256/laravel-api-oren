<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'mask'];

    public static array $relationships = [
        'equipment',
    ];

    public function equipment()
    {
//        return $this->hasMany(Equipment::class,'equipment_type_id', 'id');
    }
}
