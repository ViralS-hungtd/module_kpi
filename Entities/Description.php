<?php

namespace Modules\Description\Entities;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Description extends Model
{
    use CrudTrait;

    protected $guarded = ['id'];
}
