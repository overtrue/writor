<?php

class TermRelation extends Eloquent {
    protected $table    = 'term_relationships';
    public  $timestamps = false;


    /**
     * 分类
     *
     * @return object
     */
    public function category()
    {
        return $this->belongsTo('Category', 'category_id');
    }

    /**
     * 文件
     *
     * @return object
     */
    public function post()
    {
        return $this->belongsTo('Post', 'object_id');
    }

}