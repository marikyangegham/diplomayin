@extends('layout_admin')

@section('main-container')
    <div>
        <div class="col-lg-6">
            <table class="table">
                <thead>
                <tr>
                    <th>name</th>
                    <th>category_name</th>
                    <th>edith_category</th>
                    <th>remove_category</th>
                </tr>
                </thead>
                <tbody id="goods-types-table">
                @if(count($goodsTypes) > 0)
                    @foreach($goodsTypes as $goodsType)
                        <tr>
                            <td>{{$goodsType['name']}}</td>
                            <td>{{$goodsType->category->category_name}}</td>
                            <td><span class="glyphicon glyphicon-pencil" data-value="edit" aria-hidden="true" data-id="{{$goodsType['id']}}" data-toggle="modal" data-target="#myModal"></span></td>
                            <td><span class="glyphicon glyphicon-trash" data-value="delete" aria-hidden="true" data-id="{{$goodsType['id']}}"></span></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">edit  goods </h4>
                        </div>
                        <form method="post" action="/edit/goods">
                            <div class="modal-body">
                                <div ><p id="toChange"></p></div>
                                <input id="editArea" type="text" name="new_goods_name" required>
                                <select id="selectedCategory" name="selected_category">
                                    <option></option>
                                    @if(count($categories) > 0)
                                        @foreach($categories as $category)
                                            <option value="{{$category['id']}}" data-id="{{$category['id']}}">{{$category['category_name']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <input id="toEditArea" type="hidden" name="toChangeGoodsId" />
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary saveGoodsChange">Save changes</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger col-lg-12 alert-custom-class">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection


