<?php
/**
 * @noinspection PhpUndefinedClassInspection
 * @noinspection PhpMissingFieldTypeInspection
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Feedback extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string $table
     * @var string[]
     */
    protected $table = 'feedback';
    protected $fillable = ['name', 'email', 'subject', 'message', 'notes', 'response'];
}
