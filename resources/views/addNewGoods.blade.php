@extends('layout_admin')

@section('add-new-goods-container')
    <h3>Add new goods</h3>
    <div>
       <form action="/add/new/goods" method="post">
           <input type="text" name="name" required />
           <select name="selected_category">
               <option></option>
               @if(count($categories) > 0)
                   @foreach($categories as $category)
                       <option data-id="{{$category['id']}}">{{$category['category_name']}}</option>
                   @endforeach
               @endif
           </select>
           <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
           <input type="submit" value="ADD Goods" />
       </form>
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