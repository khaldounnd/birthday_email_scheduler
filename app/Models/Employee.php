<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string first_name
 * @property string surname
 * @property mixed birth_date
 * @property mixed email
 */

class Employee extends Model
{

    protected $table = 'employees';
    protected $fillable = ['first_name', 'surname', 'birth_date', 'email'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $guarded = ['id'];

}
