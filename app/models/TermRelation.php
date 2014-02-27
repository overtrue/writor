<?php

class TermRelation extends Eloquent {
    protected $table    = 'term_relationships';
    public  $timestamps = false;


    /**
     * 分类
     *
     * @return object
     */
    public function term()
    {
        return $this->belongsTo('Category', 'category_id');
    }

}