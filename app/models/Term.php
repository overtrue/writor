<?php

class Term extends Eloquent {

    protected $table    = 'terms';
    public  $timestamps = false;
    protected $fillable = array('name', 'slug');

    
}