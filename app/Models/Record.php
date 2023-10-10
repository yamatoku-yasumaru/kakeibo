<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category_id',
        'date',
        'amount',
        'memo'
    ];

    /**
     * このカテゴリーを所有するユーザ。（ Categoryモデルとの関係を定義）
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
