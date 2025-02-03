<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['id_user', 'id_product', 'is_checkout', 'quantity'];

    public function filter($filter = [])
    {
        return $this->when(isset($filter['search']), function ($query) use ($filter) {
            return $query->where('id', 'like', "%" . str_replace('ORDER', '', $filter['search']) . "%");
        });
    }
}
