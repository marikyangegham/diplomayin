@extends('layout_admin')

@section('stocks-container')
    <div>
        <div class="col-lg-6">
            <h3>Stocks List</h3>
                <ul>
                    @if(count($stocks) > 0)
                        @foreach($stocks as $stock)
                                <li>{{$stock['name']}}</li>
                        @endforeach
                    @endif
                </ul>
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