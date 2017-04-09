@extends('layout_admin')

@section('add-new-goods-container')
    @if(\Auth::user()->isAdmin())
    <h3>Add New Goods</h3>
    <div>
       <form action="/add/new/goods" method="post">
           <div class="marginFor">
               <span>enter name</span>
               <input type="text" name="name" required />
           </div>
           <div class="marginFor">
               <span>set type</span>
               <select name="selected_category">
                   <option></option>
                   @if(count($categories) > 0)
                       @foreach($categories as $category)
                           <option data-id="{{$category['id']}}">{{$category['category_name']}}</option>
                       @endforeach
                   @endif
               </select>
           </div>
           <div class="marginFor">
               <span>set price</span>
               <input type="text" name="price" required />
           </div>

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
    @endif
    @if(!\Auth::user()->isAdmin())
    <div><p>Required admin permission</p></div>
    @endif
@endsection