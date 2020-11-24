<?php
/**
 * @noinspection PhpUndefinedClassInspection
 * @noinspection PhpMissingFieldTypeInspection
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

    /**
     * @var string $table
     * @var array|string[] $fillable
     */
    protected $table = 'news';
    protected $fillable = ['title', 'slug', 'cover', 'author', 'source', 'body', 'date', 'views', 'rating'];

    /**
     * Категории новости
     *
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_has_news', 'news_id', 'category_id');
    }
}
