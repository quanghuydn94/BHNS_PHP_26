<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class nhanvien extends Model
{
    use HasFactory;
    protected $fillable = ['nhanvien_ten', 'nhanvien_cmnd', 'nhanvien_sdt', 'nhanvien_diachi', 'user_id'];

    public function getUserEmployee(){
        return $this->belongsTo(User::class);
    }
}
