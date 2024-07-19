<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $fillable = ['receipt_status','receipt_file','dairy_date','form_of_communication','language','letter_date','letter_ref_no','delivery_mode','mode_number','sender_type','vip','name','department','designation','organitation','email','address','pin_code','phone_number','country','state','city','category','subcategory','subject','remarks','created_at','updated_at'];
    public function receipt()
    {
        return $this->belongsTo(Deliverymode::class,'delivery_mode');
    }
    public function sender()
    {
        return $this->belongsTo(Sendertype::class,'sender_type');
    }
    public function dept()
    {
        return $this->belongsTo(Department::class,'department');
    }
}
