<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AbstractModel extends Model
{
    use SoftDeletes;
    use \App\Models\Concerns\UsesUuid;

    public static $createRules = [];

    public static $updateRules = [];
}
