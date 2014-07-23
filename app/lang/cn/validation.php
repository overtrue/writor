<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"         => ":attribute 必须勾选.",
    "active_url"       => ":attribute 不是一个合法的URL.",
    "after"            => ":attribute 必须是一个大于 :date 的日期.",
    "alpha"            => ":attribute 只能包含字母.",
    "alpha_dash"       => ":attribute 只能包含字母、数字、下划线.",
    "alpha_num"        => ":attribute 只能包含字母与数字.",
    "array"            => ":attribute 必须是一个数组.",
    "before"           => ":attribute 必须是一个小于 :date 的日期.",
    "between"          => array(
        "numeric" => ":attribute 必须在 :min 与 :max 之间.",
        "file"    => ":attribute 大小必须大于 :min 字节，小于 :max 字节.",
        "string"  => ":attribute 必须为 :min 到 :max 个字符.",
        "array"   => ":attribute 元素只能包含 :min 到 :max 个元素.",
    ),
    "confirmed"        => ":attribute 不匹配.",
    "date"             => ":attribute 不是一个合法的日期格式.",
    "date_format"      => ":attribute 不符合格式 :format.",
    "different"        => ":attribute 与 :other 必须不同.",
    "digits"           => ":attribute 必须是 :digits 个数字.",
    "digits_between"   => ":attribute 必须是 :min 到 :max 个数字.",
    "email"            => ":attribute 格式不正确.",
    "exists"           => ":attribute 不存在.",
    "image"            => ":attribute 必须是图片.",
    "in"               => ":attribute 不在可选范围内.",
    "integer"          => ":attribute 必须为整数.",
    "ip"               => ":attribute 必须为可用的IP地址.",
    "max"              => array(
        "numeric" => ":attribute 最大为 :max.",
        "file"    => ":attribute 最大为 :max 字节.",
        "string"  => ":attribute 最多 :max 个字符.",
        "array"   => ":attribute 最多包含 :max 个元素.",
    ),
    "mimes"            => ":attribute 必须为 :values 类型.",
    "min"              => array(
        "numeric" => ":attribute 最小为 :min.",
        "file"    => ":attribute 最小 :min 字节.",
        "string"  => ":attribute 最少包含 :min 个字符.",
        "array"   => ":attribute 最少有 :min 个元素.",
    ),
    "not_in"           => ":attribute 不在可选范围内.",
    "numeric"          => ":attribute 只能为数字.",
    "regex"            => ":attribute 格式不正确.",
    "required"         => ":attribute 不能为空.",
    "required_if"      => "当 :other 为 :value 的时候 :attribute 不能为空.",
    "required_with"    => "当 :values 不为空的时候 :attribute 不能为空.",
    "required_without" => "当 :values 为空的时候 :attribute 不能为空.",
    "same"             => ":attribute 与 :other 不匹配.",
    "size"             => array(
        "numeric" => ":attribute 必须为 :size.",
        "file"    => ":attribute 必须为 :size 字节.",
        "string"  => ":attribute 必须为 :size 个字符.",
        "array"   => ":attribute 必须包含 :size 个元素.",
    ),
    "unique"           => ":attribute 已经存在.",
    "url"              => ":attribute 不是一个合法的URL.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => array(),

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => array(
                    'name' => '<span class="badge badge-info">名称</span>',
                    'username' => '<span class="badge badge-info">用户名</span>',
                    'realname' => '<span class="badge badge-info">真实姓名</span>',
                    'email'    => '<span class="badge badge-info">邮箱</span>',
                    'password' => '<span class="badge badge-info">密码</span>',
                    'repassword' => '<span class="badge badge-info">确认密码</span>',
                    'tel'      => '<span class="badge badge-info">电话</span>',
                    'slug'     => '<span class="badge badge-info">别名</span>',
                    'category' => '<span class="badge badge-info">分类</span>',
                    ),

);
