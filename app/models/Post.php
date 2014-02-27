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
        return $this->hasMany('TermRelation', 'object_id')->with('term');
    }

    /**
     * 获取文章分类
     *
     * @param boolean $toArray 
     *
     * @return object
     */
    public function categorys($toArray = true)
    {
        $categorys = array();
        foreach ($this->term_relation as $termRelation) {
            $categorys[] = $toArray ? $termRelation->term->toArray() : $termRelation->term;
        }

        return $categorys;
    }
}