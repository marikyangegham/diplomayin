@extends('layout_admin')

@section('all-inputted-container')
    <div>
        <h3>Ներմուծված ապրանքները</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Ապրանքի անվանումը</th>
                <th>Ընդունողի անունը</th>
                <th>Քանակը</th>
                <th>Առաքիչը</th>
                <th>Ժամանակը</th>
            </tr>
            </thead>
            <tbody id="category-table">
            @if(count($inputtedGoods) > 0)
                @foreach($inputtedGoods as $inputtedGood)
                    <tr>
                        <td>{{$inputtedGood->good->name}}</td>
                        <td>{{$inputtedGood->user->name}}</td>
                        <td>{{$inputtedGood->quantity}}({{$inputtedGood->good->measurement}})</td>
                        <td>{{$inputtedGood->deliveryman->deliveryman_name}}</td>
                        <td>{{$inputtedGood->created_at}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <button class="btn btn-info" id="inputButton" data-toggle="modal" data-target="#myModal">Ներմուծել</button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Ներմուծել ապրանք</h4>
                    </div>
                    <form method="post" action="/input/goods">
                        <div class="modal-body">
                            <div class="margintop">
                                <div class="col-lg-4 form-group">
                                    <label>Նշել ապրանքատեսակը</label>
                                    <select id="inputGoodType" class="form-control">
                                        <option></option>
                                        @foreach ($goods as $good)
                                            <option value="{{$good['id']}}">{{$good['name']}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label>Նշել քանակը({{ $good['measurement'] }})</label>
                                    <input class="form-control" id="goodQuantity" type="number" name="goodQuantity">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label>Ընտրել առաքիչին</label>
                                    <select class="form-control" id="goodDeliveryman">
                                        <option></option>
                                        @foreach ($deliverymans as $deliveryman)
                                            <option value="{{$deliveryman['id']}}">{{$deliveryman['deliveryman_name']}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                </div>
                            </div>
                            </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Փակել</button>
                            <button type="button" class="btn btn-primary input">Ներմուծել</button>
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