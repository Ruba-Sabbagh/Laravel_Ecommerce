<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SubCategory
 * 
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property int $sub_category_product_count
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Category $category
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class SubCategory extends Model
{
	protected $table = 'sub_category';

	protected $casts = [
		'category_id' => 'int',
		'sub_category_product_count' => 'int'
	];

	protected $fillable = [
		'name',
		'category_id',
		'sub_category_product_count',
		'slug'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
