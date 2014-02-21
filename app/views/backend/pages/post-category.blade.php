@extends('backend.layout')
@section('content')
<div class="row">
        <div class="col-md-12 form-group">
            <h2>文章分类</h2>
        </div>
        <div class="col-md-12 row form-group">
            <div class="col-md-4">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">添加新分类</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{url('/admin/post/create-category')}}" method="post" accept-charset="utf-8" class="">
                            <div class="form-group">
                                <label class="control-label">标题</label>
                                <input type="text" name="title" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="control-label">别名</label>
                                <input type="text" name="alias" class="form-control" placeholder="">
                                <p class="help-block">“别名”是在URL中使用的别称，它可以令URL更美观。通常使用小写，只能包含字母，数字和连字符（-）。</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">父分类</label>
                                <select name="parent_id" class="selectboxit">
                                    <option value="0">无</option>
                                    <option value="">Hello</option>
                                    <option value="">world</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">分类描述</label>
                                <textarea name="description" class="form-control" placeholder=""></textarea>
                                <p class="help-block">描述只会在一部分主题中显示。</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label"></label>
                                <button type="submit" class="btn btn-success">添加分类目录</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /col-md-4-->
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="select-all"></th>
                            <th>分类名</th>
                            <th>描述</th>
                            <th>别名</th>
                            <th>文章</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>分类1</td>
                            <td>这是分类1的描述</td>
                            <td>cate1</td>
                            <td>20</td>
                        </tr>

                        <tr>
                            <td><input type="checkbox"></td>
                            <td>分类2</td>
                            <td>这是分类2的描述</td>
                            <td>cate2</td>
                            <td>17</td>
                        </tr>

                        <tr>
                            <td><input type="checkbox"></td>
                            <td>分类3</td>
                            <td>这是分类3的描述</td>
                            <td>cate3</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>-- 子分类1</td>
                            <td>这是子分类1的描述</td>
                            <td>cate4</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>-- 子分类2</td>
                            <td>这是子分类2的描述</td>
                            <td>cate5</td>
                            <td>9</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /col-md-4 --> 
        </div>
</div>
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ asset('/assets/js/selectboxit/jquery.selectBoxIt.css') }}"  id="style-resource-3">
<link rel="stylesheet" href="{{ asset('/assets/js/icheck/skins/minimal/_all.css') }}"  id="style-resource-5">
@endsection

@section('page_js')
<script src="{{ asset('/assets/js/selectboxit/jquery.selectBoxIt.min.js') }}" id="script-resource-11"></script>
<script src="{{ asset('/assets/js/icheck/icheck.min.js') }}" id="script-resource-18"></script>
@endsection