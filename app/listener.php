<?php


//记录SQL
Event::listen('illuminate.query', function($sql, $param)
{
    Log::info($sql . ", with[" . join(',', $param) ."]");
}); 