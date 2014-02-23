<?php

class Term extends Eloquent {

    protected $table    = 'terms';
    public  $timestamps = false;
    protected $fillable = array('name', 'slug');

    /**
     * 获取分类附属信息
     *
     * @return object
     */
    public function taxonomy()
    {
        return $this->hasOne('TermTaxonomy');
    }

    /**
     * 获取分类列表
     *
     * @param string  $taxonomy 
     * @param array   $credential 
     * @param boolean $tree
     *
     * @return object
     */
    public static function getAll($taxonomy, $credential = array())
    {
        if ($taxonomy != TermTaxonomy::TYPE_CATEGORY && $taxonomy != TermTaxonomy::TYPE_TAG) {
            throw new Exception("错误的类型 '$taxonomy'");
        }

        $terms = TermTaxonomy::{$taxonomy}()->with('term');
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
    public static function getTree($taxonomy, $credential = array())
    {
        $terms = self::getAll($taxonomy, $credential);

        return Tree::make($terms->toArray(), array('id' => 'term_id'));
    }
}