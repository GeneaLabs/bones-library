<?php namespace GeneaLabs\Bones\Library\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public static $snakeAttributes = false;
	protected $rules = [
        'title' => 'required|unique:books,title',
	];
	protected $fillable = [
        'title',
        'description',
    ];

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
