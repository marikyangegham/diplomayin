@extends('layout_admin')

@section('all-outputted-container')
    <div class="col-lg-6">
        <h3>Outputted Goods List</h3>
        <table class="table">
            <thead>
            <tr>
                <th>goods_name</th>
                <th>user_name</th>
                <th>quantity</th>
                <th>date</th>
            </tr>
            </thead>
            <tbody id="category-table">
            @if(count($outputtedGoods) > 0)
                @foreach($outputtedGoods as $outputtedGood)
                    <tr>
                        <td>{{$outputtedGood->good->name}}</td>
                        <td>{{$outputtedGood->user->name}}</td>
                        <td>{{$outputtedGood->quantity}}</td>
                        <td>{{$outputtedGood->created_at}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <button id="outputButton" data-toggle="modal" data-target="#myModal">output</button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">output goods</h4>
                    </div>
                    <form method="post" action="/output/goods">
                        <div class="modal-body">
                            <div class="col-lg-4">
                                <h4>Select good type</h4>
                                <select id="outputGoodId">
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
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary output">Output</button>
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