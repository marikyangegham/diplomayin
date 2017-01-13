@extends('layout_admin')

@section('input-output-container')
    <div class="col-lg-6">
        <h3>Catalog</h3>
        <table class="table">
            <thead>
            <tr>
                <th>stock_name</th>
                @if(count($goodsTypes) > 0)
                    @foreach($goodsTypes as $goodsType)
                        <th>{{$goodsType['name']}}</th>
                    @endforeach
                @endif
            </tr>
            </thead>
            <tbody id="catalog-table">
            @if(count($users) > 0)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name }}</td>
                        @foreach($user->c as $catalog)
                            <td>{{$catalog }}</td>
                        @endforeach
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <button id="change-quantity" data-toggle="modal" data-target="#myModal">Change Quantity</button>
        <!-- Modal -->
        <div class="modal fade custom-modal-class" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div id="custom-modal-content-style" class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Change Quantity</h4>
                    </div>
                    <form id="quantityChange" method="post" action="/change/catalog">
                        <div class="col-lg-12">
                            <div class="modal-body col-lg-12">
                                <div class="col-lg-3">
                                    <input type="radio" name="quantityPlusOrMinus" value="plus"> plus
                                    <input type="radio" name="quantityPlusOrMinus" value="minus"> minus
                                </div>
                                <div class="col-lg-9">
                                    <select id="selected_goods" name="selected_goods">
                                        <option></option>
                                        @if(count($goods) > 0)
                                            @foreach($goods as $item)
                                                <option value="{{$item['id']}}">{{$item['name']}}({{$item->category->category_name}})</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <input id="number" type="number" name="number" required>
                                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                                </div>
                                <div><h4 id="errorMessage"></h4></div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary saveQuantityChange">Save changes</button>
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
@endsection