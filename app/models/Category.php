<?php

class Category extends Eloquent {

    protected $table    = 'categorys';
    public  $timestamps = false;
    protected $fillable = array('name', 'slug');

    /**
     * 获取分类列表
     *
     * @param string  $taxonomy 
     * @param array   $credential 
     * @param boolean $tree
     *
     * @return object
     */
    public static function getAll($credential = array())
    {
        $terms = Category::orderBy('id', 'desc');
        if (!empty($credential)) {
            foreach ($credential as $field => $value) {
                $method = 'where'.studly_case($field); // whereSomeField('someValue');
                $terms = call_user_func_array(array($terms, $method), $value);        
            }
        }
        
        return $terms->get();
    }

    /**
     * 获取Term树
     *
     * @param string $taxonomy      
     * @param array  $credential
     *
     * @return array
     */
    public static function getTree($credential = array())
    {
        $terms = self::getAll($credential);

        return Tree::make($terms->toArray());
    }
}