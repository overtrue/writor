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
    public static function getAll(Closure $callback = null)
    {
        $terms = Category::orderBy('id', 'desc');
        if ($callback) {
            $callback($terms);
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
    public static function getTree(callback $callback = null)
    {
        $terms = self::getAll($callback);

        return Tree::make($terms->toArray());
    }
}