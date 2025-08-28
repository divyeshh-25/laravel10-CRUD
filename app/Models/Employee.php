<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\FuncCall;

class Employee extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable =
    [
        'fname',
        'lname',
        'sex',
        'dob',
        'phone',
        'email',
        'status',
        'salary'
    ];
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    /* <===== Accessor Methods =====> */
    public static function getStatusAttribute($value){
        return $value == 0 ?
        '<span class="badge rounded-pill bg-primary" style="font-size:12px">Active</span>':
        '<span class="badge rounded-pill bg-warning text-dark" style="font-size:12px">Inactive</span>';
    }
    public static function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }
    public static function getDobAttribute($value){
        return Carbon::parse($value)->format('d M Y');
    }
}
