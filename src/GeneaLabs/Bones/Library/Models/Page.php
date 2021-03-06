<?php namespace GeneaLabs\Bones\Library\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public static $snakeAttributes = false;
	protected $rules = [
        'title' => 'required|unique:pages,title',
        'content' => 'required'
	];
	protected $fillable = [
        'title',
        'summary',
        'content',
        'book_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
