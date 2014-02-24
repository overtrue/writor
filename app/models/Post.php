<?php

class Post extends Eloquent {
    protected $table = 'posts';
    protected $softDelete = true;

    /**
     * 分类法
     *
     * @return object
     */
    public function termRelation()
    {
        return $this->hasMany('TermRelation', 'object_id');
    }

    /**
     * 获取文章分类
     *
     * @return object
     */
    public function categorys()
    {
        //return $this->hasManyThrough('Category', 'TermRelation', 'category_id');
    }
}