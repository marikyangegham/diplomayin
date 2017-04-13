@extends('layout_admin')

@section('main-container')
    <div>
        <div>
            <h3>Ապրանքների ցուցակ</h3>
            <table class="table" id="table-goods">
                <thead>
                <tr>
                    <th>Կոդ</th>
                    <th>Ապրանքի անունը</th>
                    <th>Կատեգորիայի անունը</th>
                    <th>Չափման միավորը</th>
                    <th>արժեքը</th>
                    @if(\Auth::user()->isAdmin())
                        <th>Փոփոխել</th>
                        <th>Ջնջել</th>
                    @endif
                </tr>
                </thead>
                <tbody id="goods-types-table">
                @if(count($goodsTypes) > 0)
                    @foreach($goodsTypes as $goodsType)
                        <tr>
                            <td>{{$goodsType['id']}}</td>
                            <td>{{$goodsType['name']}}</td>
                            <td>{{$goodsType->category->category_name}}</td>
                            <td>{{$goodsType['measurement']}}</td>
                            <td>{{$goodsType['price']}}</td>

                            @if(\Auth::user()->isAdmin())
                                <td><span class="glyphicon glyphicon-pencil" data-value="edit" aria-hidden="true" data-id="{{$goodsType['id']}}" data-toggle="modal" data-target="#myModal"></span></td>
                                <td><span class="glyphicon glyphicon-trash" data-value="delete" aria-hidden="true" data-id="{{$goodsType['id']}}"></span></td>
                            @endif
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
                            <h4 class="modal-title" id="myModalLabel">Փոփոխել ապրանքը </h4>
                        </div>
                        <form method="post" action="/edit/goods">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>
                                        <p id="toChange">
                                        </p>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Նշել նոր անունը</label>
                                    <input class="form-control" id="editArea" type="text" name="new_goods_name" required>
                                </div>
                                <div  class="form-group">
                                    <label>Նշել կատեգորիան</label>
                                    <select class="form-control" id="selectedCategory" name="selected_category">
                                        <option></option>
                                        @if(count($categories) > 0)
                                            @foreach($categories as $category)
                                                <option value="{{$category['id']}}" data-id="{{$category['id']}}">{{$category['category_name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                               <div class="form-group">
                                   <label>Նշել արժեքը</label>
                                   <input class="form-control" id="new_goods_price" type="text" name="new_goods_price" required>
                               </div>

                                <input id="toEditArea" type="hidden" name="toChangeGoodsId" />
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Փակել</button>
                                <button type="button" class="btn btn-primary saveGoodsChange">Պահպանել փոփոխությունը</button>
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


