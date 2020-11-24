<?php
/**
 * @noinspection PhpUndefinedClassInspection
 * @noinspection PhpMissingFieldTypeInspection
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    /**
     * @var string $table
     * @var string[]
     */
    protected $table = 'feedback';
    protected $fillable = ['name', 'email', 'theme', 'body', 'answer'];
}
