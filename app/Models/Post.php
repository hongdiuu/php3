<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // //điều chỉnh liên kết đến bảng
    // protected $table="tên bảng muốn kết nối";

    // //khai báo lại tên khóa chính 
    // protected $primaryKey ="tên khóa chính khác";

    // //khai báo kiểu dữ liệu cho khóa chính mới
    // protected $keyType="string";

    // //tắt tăng tự động cho khóa chính 
    // public $incrementing = false;

    // //điều chỉnh kết nối db
    // protected $connection= "lab4";
    protected $fillable = [
        'title', 'content'
    ];

}
