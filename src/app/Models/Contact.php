<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //検索機能用メソッド
    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
    }
    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }
    public function scopeDateSearch($query, $created_at)
    {
        if(!empty($created_at)) {
            $query->where('created_at', $created_at);
        }
    }
    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('last_name', 'like', '%' . $keyword . '%')
                ->orWhere('first_name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%');
        }
    }
    //gender表示用
    //genderLabelを判別するための条件式
    // public static function selectGenderLabel($gender)
    // {
    //     switch ($gender) {
    //         case 1:
    //             return "男性";
    //             break;
    //         case 2:
    //             return "女性";
    //             break;
    //         case 3:
    //             return "その他";
    //             break;
    //     }
    // }

    //genderの数字に対応するラベルを定義
    public static $genderLabels = [
        1 => '男性',
        2 => '女性',
        3 => 'その他',
    ];
    //genderの数字をラベルに変換するメソッド
    public function getGenderLabel($gender)
    {
        return self::$genderLabels[$gender];
    }

}
