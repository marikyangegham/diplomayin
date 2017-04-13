@extends('layout_admin')

@section('all-outputted-container')
    <?php $totalPrice = 0; ?>
    <div>
        <h3>Դուրս գրված ապրանքներ</h3>
        <table class="table" id="table-output">
            <thead>
            <tr>
                <th>Կոդ </th>
                <th>Ապրանքի անվանումը</th>
                <th>Դուրս գրողի անունը</th>
                <th>Քանակ</th>
                <th>Արժեքը</th>
                <th>Գումարային Արժեքը</th>
                <th>Դուրսգրման ամսաթիվը</th>
            </tr>
            </thead>
            <tbody id="category-table">
            @if(count($outputtedGoods) > 0)
                @foreach($outputtedGoods as $outputtedGood)
                    <?php
                        $price = ($outputtedGood->good->price + $outputtedGood->good->price * 10/100) *  $outputtedGood->quantity;
                        $totalPrice += $price;
                    ?>
                    <tr>
                        <td>{{$outputtedGood->good->id}}</td>
                        <td>{{$outputtedGood->good->name}}</td>
                        <td>{{$outputtedGood->user->name}}</td>
                        <td>{{$outputtedGood->quantity}} ({{$outputtedGood->good->measurement}}) </td>
                        <td>{{$outputtedGood->good->price + $outputtedGood->good->price * 10/100 }}</td>
                        <td>{{$price}}</td>
                        <td>{{$outputtedGood->created_at}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
            <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>{{$totalPrice }}</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
        <button class="btn btn-info" id="outputButton" data-toggle="modal" data-target="#myModal">Դուրս գրել</button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Դուրս գրել ապրանք</h4>
                    </div>
                    <div id="form">
                        <form method="post" action="/output/goods">
                            <div class="modal-body" >
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <label>Նշել ապրանքատեսակը</label>
                                        <select class="form-control" id="outputGoodId">
                                            <option></option>
                                            @foreach ($goods as $good)
                                                <option value="{{$good['id']}}">{{$good['name']}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                    </div>
                                    <div class="col-lg-12 form-group" >
                                        <label>Նշել քանակը</label>
                                        <input class="form-control" id="goodQuantity" type="number" name="goodQuantity">
                                    </div>

                                    <div class="col-lg-12 form-group if-failed">
                                        <h3>Պահեստում չկա բավականաչափ ապրանք</h3>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Փակել</button>

                                <button type="button" class="btn btn-primary request">Պատվիրել ցանցի այլ պահեստից</button>
                                <button type="button" class="btn btn-primary  output">Դուրս գրել</button>
                            </div>
                        </form>
                    </div>

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