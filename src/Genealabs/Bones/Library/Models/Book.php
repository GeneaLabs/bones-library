<?php namespace GeneaLabs\Bones\Library\Models;

class Book extends \BaseModel
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
