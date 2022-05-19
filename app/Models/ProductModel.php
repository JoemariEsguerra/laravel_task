<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'Productid';
    protected $fillable = [
        "Productid",
        "ProductCode",
        "ProductName",
        "Description",
        "Price",
        "IsActive",
        "color",
        "size",
        "CategoryId"
    ];
}
