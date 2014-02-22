<?php

class TermTaxonomy extends Eloquent {

    //类型taxonomy
    const TYPE_CATEGORY = 'category';
    const TYPE_TAG      = 'tag';

    protected $table = 'term_taxonomy';
    public $timestamps = false;

    /**
     * 关联分类名
     *
     * @return object
     */
    public function scopeCategory()
    {
        return $this->whereTaxonomy(self::TYPE_CATEGORY);
    }

    /**
     * 分类名称
     *
     * @return object
     */
    public function term()
    {
        return $this->belongsTo('Term');
    }

}