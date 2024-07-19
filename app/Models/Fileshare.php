<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fileshare extends Model
{
    use HasFactory;
    protected $fillable = ['file_id','gnotes_id','department_id','section_id','user_id','notifyby','share_file_status','remarks','duedate','createdBy','actiontype','priority'];
    
    public function fileshare()
    {
        return $this->belongsTo(File::class,'file_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    public function filename()
    {
        return $this->belongsTo(File::class,'file_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    public function notes()
    {
        return $this->belongsTo(Notes::class, 'gnotes_id');
    }
}
