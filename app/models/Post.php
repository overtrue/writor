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
            !$termRelation->category || $categories[] = $toArray ? $termRelation->category->toArray() : $termRelation->category;
        }

        return $categories;
    }

    /**
     * 设置文章分类
     *
     * @param intger|array $categories 
     *
     * @return boolean
     */
    public function setCategories($categories)
    {
        is_array($categories) || $categories = array($categories);

        //如果不同才存
        if (Input::get('old_category', '') != join(',', $categories)) {
            $this->termRelation()->delete();
            $termRelMultiData = array_map(function($categoryId) {
                return array(
                        'object_id'   => $this->id,
                        'category_id' => $categoryId
                       );
            }, $categories);
            //一次性写入多条
            //请参考：http://www.golaravel.com/docs/4.1/queries/#inserts
            return false !== TermRelation::insert($termRelMultiData);    
        }

        return true;
    }
}