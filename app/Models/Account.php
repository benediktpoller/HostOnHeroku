<?php

namespace App\Models;

class Account extends AbstractModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enabled',
    ];

    public static $createRules = [
        'enabled' => 'boolean',
    ];

    public static $updateRules = [
        'enabled' => 'boolean',
    ];

    protected $casts = [
        'enabled' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
