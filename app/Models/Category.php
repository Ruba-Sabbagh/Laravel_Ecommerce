<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $sub_category_count
 * @property int $category_product_count
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Product[] $products
 * @property Collection|SubCategory[] $sub_categories
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'category';

	protected $casts = [
		'sub_category_count' => 'int',
		'category_product_count' => 'int'
	];

	protected $fillable = [
		'name',
		'slug',
		'sub_category_count',
		'category_product_count'
	];

	public function products()
	{
		return $this->hasMany(Product::class);
	}

	public function sub_categories()
	{
		return $this->hasMany(SubCategory::class);
	}
}
