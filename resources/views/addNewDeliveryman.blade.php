@extends('layout_admin')

@section('add-new-deliveryman-container')
    @if(\Auth::user()->isAdmin())
        <div class="col-lg-6">

            <div class="col-lg-12">
                <h3>Add New Deliveryman</h3>
                <form method="post" action="/add/new/deliveryman">
                    <span>enter deliveryman name</span>
                    <input type="text" name="deliveryman_name" required>
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <input type="submit" value="ADD deliveryman" />
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
        <div><p>Required admin permission</p></div>
    @endif
@endsection