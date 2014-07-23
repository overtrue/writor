<?php

/**
 * 根据id与父id调整数组顺序并加上级别符号
 *
 * Usage:
 * <pre>
 * $data = arra(
 *          array('id' => 1, 'parend' => 0, 'name' => '分类1' ),
 *          array('id' => 2, 'parend' => 0, 'name' => '分类2' ),
 *          array('id' => 3, 'parend' => 2, 'name' => '分类21' ),
 *          array('id' => 4, 'parend' => 3, 'name' => '分类211' ),
 *         );
 *
 * $tree = Tree::make($data);
 *
 * output:
 * $data = arra(
 *          array('id' => 1, 'parend' => 0, 'name' => '分类1','level' => 0, 'head' => true,'tail' => false, 'icon' => ''),
 *          array('id' => 2, 'parend' => 0, 'name' => '分类2','level' => 0, 'head' => false,'tail' => true, 'icon' => ''),
 *          array('id' => 3, 'parend' => 2, 'name' => '分类21','level' => 1, 'head' => true,'tail' => false, 'icon' => '  ├'),
 *          array('id' => 4, 'parend' => 3, 'name' => '分类211','level' => 2, 'head' => false,'tail' => true, 'icon' => '  └'),
 *         );
 * </pre>
 */
class Tree {

    private static $level  = -1;
    private static $output = array();
    private static $prefix = array();

    /**
     * 键名
     *
     * @var array
     */
    static $keys  = array(
                     'id'       => 'id', 
                     'parent'   => 'parent', 
                     'children' => 'children', 
                     'level'    => 'level', 
                     'tail'     => 'tail',
                     'head'     => 'head',
                     'icon'     => 'icon',
                    );
    /**
     * 符号
     *
     * @var array
     */
    static $icons = array(
                     'level'  => '│', 
                     'last'   => '└', 
                     'branch' => '├',
                     'space'  => '&nbsp;&nbsp;&nbsp;&nbsp;',
                    );

    static $data  = array();


    /**
     * 依赖ID与父ID  将一维数组转换成树
     *
     * @param array  $data        
     * @param string $idKey       
     * @param string $parentKey   
     * @param string $childrenKey 
     *
     * @return array
     */
    public static function make(array $data, array $keys = array())
    {
        self::$keys = array_merge(self::$keys, $keys);
        self::$data = $data;
        $data = self::getChildren(0, self::$data);

        return self::buildTree($data);
    }

    /**
     * 生成树
     *
     * @param array $data 
     *
     * @return object
     */
    private static function buildTree(&$data)
    {
        self::$level++; // 维度

        $i     = 1;   //用于判断是否为最后一个
        $count = count($data);
        $tmp   = self::$prefix;

        if (self::$level >= 1) {
            if ($count > 1) {
                self::$prefix[] = self::$icons['level'] . self::$icons['space'];
            } else {
                self::$prefix[] = self::$icons['space'];
            }
        }

        //array_pop($tmp);
        foreach ($data as $key => $item) {
            // 取子集
            $children = self::getChildren($item[self::$keys['id']]);
            $isHead   = ($i == 1);
            $isTail   = ($i++ == $count);

            // 加上相关数据
            $item[self::$keys['level']] = self::$level;
            $item[self::$keys['tail']]  = $isTail;
            $item[self::$keys['head']]  = $isHead;

            $icon = join('', $tmp);
            // 第1级开始加图标
            if (self::$level > 0) {
                if ($isTail) {
                    $icon .= self::$icons['last'];
                    //array_pop(self::$prefix);
                } else {
                    $icon .= self::$icons['branch'];
                }
            }

            $item[self::$keys['icon']] = empty($icon) ? $icon : self::$icons['space'] . $icon;

            self::$output[] = $item;
            if (!empty($children)) {
                if ($isTail) { //最后一个
                    array_pop(self::$prefix);
                    self::$prefix[] = self::$icons['space'];
                }
                
                self::buildTree($children);
            }
        }

        array_pop(self::$prefix);

        self::$level--;

        return self::$output;
    }

    /**
     * 获取子集
     *
     * @param integer $parentId 
     *
     * @return array
     */
    private static function getChildren($parentId = 0, array $data = array())
    {
        $arr = array();
        foreach (self::$data as $key => $item) {
            if ($item[self::$keys['parent']] == $parentId) {
                $arr[] = $item;
            }
        }

        return $arr;
    }

}