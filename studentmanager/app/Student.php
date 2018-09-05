<?php
/**
 * Created by PhpStorm.
 * User: 15840
 * Date: 2018/9/3
 * Time: 20:07
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{
    protected $table="student";

    public $timestamps=true;

    public $fillable=['name','age','sex']; //批量赋值

/*   protected function asDateTime($value)
    {
        return $value;
    }*/

    protected function getDateFormat()
    {
        return time();
    }
}