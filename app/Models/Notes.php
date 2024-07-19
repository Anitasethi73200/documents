<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;
    protected $fillable = ['id','file_id','description'];
    public function greennotes()
    {
        return $this->belongsTo(File::class,'file_id');
    }
}
