<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;
    protected $fillable = ['id ','sharetype','comments','revert_status', 'role_id', 'file_id', 'doc_id', 'receverid', 'status', 'department_id', 'section_id', 'senderId', 'modifyBy', 'deletedBy'];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function document()
    {
        return $this->belongsTo(Document::class, 'doc_id');
    }

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id');
    }
}
