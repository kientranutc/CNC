<?php
namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {
    protected  $table = 'categories';
    public function parent() {
        return $this->belongsTo(static::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(static::class, 'parent_id');
    }
}
?>