<?php

class Post extends Eloquent {
    protected $table      = 'posts';
    protected $softDelete = true;

    /**
     * 分类法
     *
     * @return object
     */
    public function termRelation()
    {
        return $this->hasMany('TermRelation', 'object_id')->with('category');
    }

    /**
     * 获取文章分类
     *
     * @param boolean $toArray 
     *
     * @return object
     */
    public function categories($toArray = true)
    {
        $categories = array();
        foreach ($this->term_relation as $termRelation) {
            $categories[] = $toArray ? $termRelation->category->toArray() : $termRelation->category;
        }

        return $categories;
    }
}