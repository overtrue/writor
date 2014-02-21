@extends('backend.layout')
@section('content')
<div class="row">
        <div class="col-md-12 form-group">
        <h2 class="inline-block">所有文章</h2><button class="btn btn-xs btn-info" onclick="javascript:window.location.href='{{ url('admin/post/new') }}'" >写文章</button>
        </div>
        <div class="col-md-12 form-group">
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