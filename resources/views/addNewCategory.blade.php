@extends('layout_admin')

@section('add-type-container')
    @if(\Auth::user()->isAdmin())
    <div>

        <div class="col-lg-12">
            <h3>Ավելացնել նոր կատեգորիա</h3>
            <form   method="post" action="/add/new/category">
                <div class="form-group">
                    <label>մուտքագրեք կատեգորիայի անվանումը</label>
                    <input class="form-control" type="text" name="category_name" required>
                </div>
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input type="submit" class="btn btn-info" value="Ավելացնել">

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