@extends('layout_admin')

@section('add-new-deliveryman-container')
    @if(\Auth::user()->isAdmin())
        <div>

            <div class="col-lg-12">
                <h3>Ավելացնել նոր առաքիչ</h3>
                <form method="post" action="/add/new/deliveryman">
                    <div class="form-group">
                        <label>Մուտքագրեք առաքիչի անունը</label>
                        <input class="form-control" type="text" name="deliveryman_name" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <input class="btn btn-info" type="submit" value="Ավելացնել" />
                    </div>

                </form>
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
    @endif
    @if(!\Auth::user()->isAdmin())
        <div><p>Մուտքը միայն Ադմինների համար</p></div>
    @endif
@endsection