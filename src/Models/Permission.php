<?php

namespace Viviniko\Permission\Models;

use Illuminate\Support\Facades\Config;

class Permission
{
    protected $fillable = ['name', 'display_name', 'description'];

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('permission.permissions_table');
    }
}