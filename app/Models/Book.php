<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Book extends Model
{
    use HasFactory;
    public $table = "books";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'photo',
        'price'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->using(BookUser::class);
    }
    public function scopeWithWishlistFlag($query, $userId)
    {
        if(!empty($userId)) {
            return $query->leftJoin('wishlists', function ($join) use ($userId) {
                $join->on('books.id', '=', 'wishlists.book_id')
                    ->where('wishlists.user_id', '=', $userId);
            })
            ->select('books.*')
            ->selectRaw('CASE WHEN wishlists.id IS NULL THEN 0 ELSE 1 END AS is_in_wishlist');
        }
        return $query;
    }
}
