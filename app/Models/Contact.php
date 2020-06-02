<?php

namespace App\Models;

class Contact extends AbstractModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email'
    ];

    public static $createRules = [
        'name' => 'required|max:255',
        'email' => 'required|email',
    ];

    public static $updateRules = [
        'name' => 'max:255',
        'email' => 'email',
    ];

    public function toArray()
    {
        return [
            'uuid' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone
        ];
    }
}
