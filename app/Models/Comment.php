<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'user_id', 'name', 'email', 'comment'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * A comment may have many replies.
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    /**
     * A comment belongs to a parent comment.
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    /**
     * A comment belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
