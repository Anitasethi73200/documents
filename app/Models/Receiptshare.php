<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiptshare extends Model
{
    use HasFactory;

    public function Department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
    public function Section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    public function Receipt()
    {
        return $this->belongsTo(Receipt::class,'receipt_id');
    }
}
