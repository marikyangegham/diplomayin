@extends('layout_admin')

@section('goods-container')
    <div class="col-lg-6">
        <h3>Categories List</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>category_name</th>
                    @if(\Auth::user()->isAdmin())
                        <th>edith_category</th>
                        <th>remove_category</th>
                    @endif
                </tr>
            </thead>
            <tbody id="category-table">
            @if(count($categories) > 0)
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category['category_name']}}</td>
                        @if(\Auth::user()->isAdmin())
                            <td><span class="glyphicon glyphicon-pencil" data-value="edit" aria-hidden="true" data-id="{{$category['id']}}" data-toggle="modal" data-target="#myModal"></span></td>
                            <td><span class="glyphicon glyphicon-trash" data-value="delete" aria-hidden="true" data-id="{{$category['id']}}"></span></td>
                        @endif
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">edit category</h4>
                    </div>
                    <form method="post" action="/edit/category">
                        <div class="modal-body">
                                <div ><p id="toChange"></p></div>
                                <input id="editArea" type="text" name="new_category_name" required>
                                <input id="toEditArea" type="hidden" name="toChangeCatecoryId" />
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary saveChange">Save changes</button>
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
@endsection