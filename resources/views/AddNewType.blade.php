@extends('layout_admin')

@section('add-type-container')
    <div>
        <form method="post" action="/addNewType">
            <input type="text" name="typeName">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <input type="submit" value="submit">
        </form>

    </div>
@endsection