<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Document extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $fillable = ['file_id','file','doc_id','dtype','file_name','meta_title','documentpath','description','comments','createdBy','modifyBy','deletedBy','status'];
    public function document()
    {
        return $this->belongsTo(File::class,'file_id');
    }
}
