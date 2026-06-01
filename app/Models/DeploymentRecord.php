<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeploymentRecord extends Model
{
    use HasFactory;

    // السماح بإضافة البيانات لحقل الحالة
    protected $fillable = ['status'];
}
