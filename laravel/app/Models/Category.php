<?php
/**
 * @noinspection PhpUndefinedClassInspection
 * @noinspection PhpMissingFieldTypeInspection
 */

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string $table
     * @var array|string[] $fillable
     * @var bool $timestamps
     */
    protected $table = 'categories';
    protected $fillable = ['title', 'slug', 'description'];
    public $timestamps = false;

    /**
     * Новости в категории
     *
     * @return BelongsToMany
     */
    public function news()
    {
        return $this->belongsToMany(News::class, 'category_has_news', 'category_id', 'news_id');
    }
}
