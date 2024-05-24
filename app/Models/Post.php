<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'category_id'
        ]
    use HasFactory;
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this::with('category')->orderBy('category_at', 'DESC')->paginate($limit_count);
    }
    public function category()
    {
        return $this ->belongsTo(Category::class);
    }
}
