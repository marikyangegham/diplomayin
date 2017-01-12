@extends('layout_admin')

@section('add-type-container')
    <div class="col-lg-6">

        <div class="col-lg-12">
            <form method="post" action="/addNewType">

                <input type="text" name="category_name" required>
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input type="submit" value="submit">
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
@endsection