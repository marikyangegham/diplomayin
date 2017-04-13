@extends('layout_admin')

@section('returned-goods')
    <?php
    $totalPrice = 0;
    ?>
        <div>
            <h3>Վերադարձված ապրանքները</h3>
            <table class="table" id="table-returned">
                <thead>
                <tr>
                    <th>Կոդ</th>
                    <th>Ապրանքի անվանումը</th>
                    <th>Վերադարձնողի անունը</th>
                    <th>Քանակը</th>
                    <th>Արժեքը</th>
                    <th>Ժամանակը</th>
                </tr>
                </thead>
                <tbody id="category-table">
                @if(!empty($returnedGoods))
                    @foreach($returnedGoods as $returnedGood)
                        <?php
                        $price = $returnedGood->good->price * $returnedGood->quantity;
                        $totalPrice += $price;
                        ?>
                        <tr>
                            <td>{{$returnedGood->good->id}}</td>
                            <td>{{$returnedGood->good->name}}</td>
                            <td>{{$returnedGood->user->name}}</td>
                            <td>{{$returnedGood->quantity}}({{$returnedGood->good->measurement}})</td>
                            <td>{{$returnedGood->good->price}}</td>
                            <td>{{$returnedGood->created_at}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>{{$totalPrice }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            <button class="btn btn-info" id="inputButton" data-toggle="modal" data-target="#myModal">Վերադարձնել</button>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Վերադարձնել ապրանք</h4>
                        </div>
                        <form method="post" action="/return/goods">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <label>Նշել ապրանքատեսակը</label>
                                        <select id="returnGoodType" class="form-control">
                                            <option></option>
                                            @foreach ($goods as $good)
                                                <option data-measurement="{{$good['measurement']}}" value="{{$good['id']}}">{{$good['name']}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <label>Նշել քանակը(<span id="return-goods-measurement"></span>)</label>
                                        <input class="form-control" id="goodQuantity" type="number" name="goodQuantity">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Փակել</button>
                                <button type="button" class="btn btn-primary return">Վերադարձնել</button>
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