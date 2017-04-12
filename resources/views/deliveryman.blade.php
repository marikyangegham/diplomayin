@extends('layout_admin')

@section('deliveryman-container')
    <div>
        <div>
            <h3>Առաքիչների ցուցակ</h3>
            <table class="table" id="table-deliveryman">
                <thead>
                <tr>
                    <th>Առաքիչ</th>
                    @if(\Auth::user()->isAdmin())
                        <th>Փոփոխել</th>
                        <th>Ջնջել</th>
                    @endif
                </tr>
                </thead>
                <tbody id="deliveryman-table">
                @if(count($deliverymans) > 0)
                    @foreach($deliverymans as $deliveryman)
                        <tr>
                            <td>{{$deliveryman['deliveryman_name']}}</td>
                            @if(\Auth::user()->isAdmin())
                                <td><span class="glyphicon glyphicon-pencil" data-value="edit" aria-hidden="true" data-id="{{$deliveryman['id']}}" data-toggle="modal" data-target="#myModal"></span></td>
                                <td><span class="glyphicon glyphicon-trash" data-value="delete" aria-hidden="true" data-id="{{$deliveryman['id']}}"></span></td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade deliveryman-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Փոփոխել առաքիչին </h4>
                        </div>
                        <form method="post" action="/edit/deliveryman">
                            <div class="modal-body">


                                    <div class="form-group">
                                        <label>
                                            <p id="toChange"></p>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <span>Նշել նոր անունը</span>
                                        <input class="form-control" id="editArea" type="text" name="new_deliveryman_name" required>
                                    </div>

                                    <input id="toEditArea" type="hidden" name="toChangeDeliverymanId" />
                                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Փակել</button>
                                <button type="button" class="btn btn-primary saveDeliverymanChange">Պահպանել փոփոխությունը</button>
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


