<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Collection, Model};
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $title Заголовок
 * @property string $slug Транслитерация заголовка
 * @property string $title_eng Заголовок
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|News[] $news
 * @property-read int|null $news_count
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereSlug($value)
 * @method static Builder|Category whereTitle($value)
 * @method static Builder|Category whereTitleEng($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Category extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'categories';
    /** @var string[] */
    protected $fillable = ['category_id', 'news_id'];
    /** @var bool */
    protected $timestamp = false;

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
