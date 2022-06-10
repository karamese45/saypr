<?php

namespace App\Models;


class Company extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'website',
        'image',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id', 'id');
    }
}
