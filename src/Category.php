<?php

namespace Pvtl\VoyagerBlog;

use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Traits\HasRelationships;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable,
        HasRelationships;

    protected $translatable = ['slug', 'name'];

    protected $table = 'categories';

    protected $fillable = ['slug', 'name'];

    public function posts()
    {
        return $this->hasMany(Voyager::modelClass('BlogPost'))
            ->published()
            ->orderBy('created_at', 'DESC');
    }

    public function parentId()
    {
        return $this->belongsTo(self::class);
    }
}
