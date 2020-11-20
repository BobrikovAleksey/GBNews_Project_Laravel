<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\{Builder, Collection, Model};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\News
 *
 * @property int $id
 * @property string $title Заголовок
 * @property string $slug Транслитерация заголовка
 * @property string|null $cover Ссылка на обложку
 * @property string $body Содержание
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @method static Builder|News newModelQuery()
 * @method static Builder|News newQuery()
 * @method static Builder|News query()
 * @method static Builder|News whereBody($value)
 * @method static Builder|News whereCover($value)
 * @method static Builder|News whereCreatedAt($value)
 * @method static Builder|News whereId($value)
 * @method static Builder|News whereSlug($value)
 * @method static Builder|News whereTitle($value)
 * @method static Builder|News whereUpdatedAt($value)
 * @mixin Eloquent
 */
class News extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'news';

    protected $fillable = ['title', 'slug', 'cover', 'author', 'source', 'date', 'body'];

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
