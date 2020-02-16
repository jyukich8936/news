<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class News extends Model
{
    protected $table = 'news';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
			