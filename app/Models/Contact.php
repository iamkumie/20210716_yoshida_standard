<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion'];

    public function getData()
    {
        $txt = $this->id . '' . $this->fullname . '' . $this->gender . '' . $this->email . '' . $this->opinion;
        return $txt;
    }

    public function getUserStatusAttribute(): string
    {
        return $this->gender;
    }

    public function getGenderAttribute($value): string
    {
        return ($value === 1) ? '男性' : '女性';
    }
}
