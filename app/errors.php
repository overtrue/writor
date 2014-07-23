<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;


$error = function(Exception $exception, $code = 500)
{
    Log::error($exception);
    if (Request::ajax()) {
        return Response::json(array(
                                'error_code' => $code,
                                'error_desc' => $exception->getMessage() . ' at file' . $exception->getFile() . ' line:' . $exception->getLine(),
                               ));
    } elseif (App::environment() == 'production') {
        return View::make($code);
    }
};

// 一般错误
App::error($error);

// 404
App::missing(function($exception) use ($error){
    return $error($exception, 404);
});

// 服务器内部错误
App::fatal($error);

//模型未找到
App::error($error);