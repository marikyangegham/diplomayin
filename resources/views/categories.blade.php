@extends('layout_admin')

@section('goods-container')
    <div>
        <h3>Կատեգորիաների ցուցակ</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Կատեգորիայի անուն</th>
                    @if(\Auth::user()->isAdmin())
                        <th>Փոփոխել կատեգորիան</th>
                        <th>Ջնջել կատեգորիան</th>
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
                        <h4 class="modal-title" id="myModalLabel">Փոփոխել կատեգորիան</h4>
                    </div>
                    <form method="post" action="/edit/category">
                        <div class="modal-body">
                            <div class="form-group">
                                <div><p id="toChange"></p></div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="editArea" type="text" name="new_category_name" required>
                                <input id="toEditArea" type="hidden" name="toChangeCatecoryId" />
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Փակել</button>
                            <button type="button" class="btn btn-primary saveChange">Պահպանել փոփոխությունը</button>
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