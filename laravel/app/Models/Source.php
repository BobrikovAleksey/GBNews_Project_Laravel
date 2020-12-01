<?php
/**
 * @noinspection PhpUndefinedClassInspection
 * @noinspection PhpMissingFieldTypeInspection
 */

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Source extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string $table
     * @var array|string[] $fillable
     * @var bool $timestamps
     */
    protected $table = 'sources';
    protected $fillable = ['category_id', 'name', 'link'];
    public $timestamps = false;

    /**
     * Категории новости
     *
     * @return HasMany
     */
    public function categories()
    {
        return $this->hasMany(Category::class, 'category_id');
    }
}
