<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Monitor extends AbstractModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label',
        'url',
        'interval',
        'type',
        'method',
        "status"
    ];

    public static $createRules = [
        'label' => 'required|max:255',
        'url' => 'required|url',
    ];

    public static $updateRules = [
        'label' => 'max:255',
        'url' => 'url',
    ];

    protected $casts = [
        'enabled' => 'boolean',
        'ignore_ssl_errors' => 'boolean',
        'remind_ssl_expiry' => 'boolean'
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

    /**
     * The alerts that belong to the monitor.
     */
    public function alerts()
    {
        return $this->belongsToMany(\App\Alert::class);
    }

    /**
     * The plan that belongs to the monitor.
     */
    public function plan()
    {
        return $this->belongsToOne(\App\Plans::class);
    }
}
