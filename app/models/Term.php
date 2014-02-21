<?php

class Term extends Eloquent {
    //类型
    const TYPE_CATEGORY = 'category';
    const TYPE_TAG      = 'tag';

    protected $table = 'terms';
    
}