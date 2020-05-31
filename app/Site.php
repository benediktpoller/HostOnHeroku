<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Site extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['label', 'url'];

    public function toArray() {
        return [
            'id' => $this->id,
            'label' => $this->label,
            'url' => $this->url
        ];
    } 
}
