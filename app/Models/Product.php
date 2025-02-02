<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'category', 'stock', 'image'];

    public function filter($filter = [])
    {
        return $this->when(isset($filter['search']), function ($query) use ($filter) {
            return $query->where('name', 'like', "%$filter[search]%");
        });
    }
}
