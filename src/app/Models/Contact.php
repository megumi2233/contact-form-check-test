<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // 保存可能なカラムを指定
    protected $fillable = [
        'first_name',
        'last_name',
        'name',       // ← 氏名まとめ用
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'type',       
        'message',    
    ];
}
