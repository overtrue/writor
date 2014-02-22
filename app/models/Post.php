<?php

class Post extends Eloquent {
    protected $table = 'posts';
    protected $softDelete = true;

}