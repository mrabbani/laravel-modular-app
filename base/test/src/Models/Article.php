<?php namespace WebEd\Base\Test\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $primaryKey = 'id';

    protected $fillable = [];

    public $timestamps = false;
}
