@extends('layout_admin')

@section('add-new-goods-container')
    @if(\Auth::user()->isAdmin())
    <h3>Ավելացնել նոր ապրանքատեսակ</h3>
    <div>
       <form action="/add/new/goods" method="post">
           <div class="form-group">
               <label>Մուտքագրեք անունը</label>
               <input type="text" name="name" required class="form-control"/>
           </div>
           <div class="form-group">
               <label>Նշեք կատեգորիան</label>
               <select name="selected_category" class="form-control">
                   <option></option>
                   @if(count($categories) > 0)
                       @foreach($categories as $category)
                           <option value="{{$category['id']}}" data-id="{{$category['id']}}">{{$category['category_name']}}</option>
                       @endforeach
                   @endif
               </select>
           </div>
           <div class="form-group">
               <label>Նշեք արժեքը</label>
               <input type="text" name="price" required  class="form-control"/>
           </div>
           <div  class="form-group">
               <label>Նշեք չափման միավորը</label>
               <select class="form-control" name="measurement">
                   <option>Հատ</option>
                   <option>ԿԳ</option>
               </select>
           </div>

           <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
           <input type="submit" value="Ավելացնել" class="btn btn-success" />
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
    <div><p>Մուտքը միայն Ադմինների համար</p></div>
    @endif
@endsection