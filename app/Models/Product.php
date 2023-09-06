<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $name
 * @property string $short_desc
 * @property string $long_desc
 * @property int $price
 * @property int $category_id
 * @property int $sub_category_id
 * @property int $count
 * @property string $img
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Category $category
 * @property SubCategory $sub_category
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';

	protected $casts = [
		'price' => 'int',
		'category_id' => 'int',
		'sub_category_id' => 'int',
		'count' => 'int'
	];

	protected $fillable = [
		'name',
		'short_desc',
		'long_desc',
		'price',
		'category_id',
		'sub_category_id',
		'count',
		'img',
		'slug'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function sub_category()
	{
		return $this->belongsTo(SubCategory::class);
	}
}
