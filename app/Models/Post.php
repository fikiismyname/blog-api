<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
    use HasFactory, SoftDeletes;

    /**
     * The attribute that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'user_id',
        'featured_image_url',
        'title',
        'slug',
        'description',
        'body',
    ];

    /**
     * Get the route key for the model.
     * @return string
     */
    public function getRouteKeyName() {
        return 'slug';
    }

    /**
     * Relationship between Post and User.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship between Post and Category.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship between Post and Tag
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
