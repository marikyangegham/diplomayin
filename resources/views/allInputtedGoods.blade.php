@extends('layout_admin')

@section('all-inputted-container')
    <div class="col-lg-6">
        <h3>Inputted Goods List</h3>
        <table class="table">
            <thead>
            <tr>
                <th>goods_name</th>
                <th>user_name</th>
                <th>quantity</th>
                <th>deliveryman</th>
                <th>date</th>
            </tr>
            </thead>
            <tbody id="category-table">
            @if(count($inputtedGoods) > 0)
                @foreach($inputtedGoods as $inputtedGood)
                    <tr>
                        <td>{{$inputtedGood->good->name}}</td>
                        <td>{{$inputtedGood->user->name}}</td>
                        <td>{{$inputtedGood->quantity}}</td>
                        <td>{{$inputtedGood->deliveryman->deliveryman_name}}</td>
                        <td>{{$inputtedGood->created_at}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <button id="inputButton" data-toggle="modal" data-target="#myModal">input</button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Input goods</h4>
                    </div>
                    <form method="post" action="/input/goods">
                        <div class="modal-body">
                            <div class="col-lg-4">
                                <h4>Select good type</h4>
                                <select id="inputGoodType">
                                    <option></option>
                                    @foreach ($goods as $good)
                                        <option value="{{$good['id']}}">{{$good['name']}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            </div>
                            <div class="col-lg-4">
                                <h4>Set quantity</h4>
                                <input id="goodQuantity" type="number" name="goodQuantity">
                            </div>
                            <div class="col-lg-4">
                                <h4>Select deliveryman</h4>
                                <select id="goodDeliveryman">
                                    <option></option>
                                    @foreach ($deliverymans as $deliveryman)
                                        <option value="{{$deliveryman['id']}}">{{$deliveryman['deliveryman_name']}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary input">Input</button>
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