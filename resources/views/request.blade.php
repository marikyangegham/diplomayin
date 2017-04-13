@extends('layout_admin')

@section('request-container')
    <div>
        <div class="col-lg-12">
            <div class="col-lg-12">
                <h3>Հարցումների ցուցակը այլ պահեստներին</h3>
                <table class="table" id="request-to-me-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ապրանքի անունը</th>
                        <th>Արժեքը</th>
                        <th>Քանակը</th>
                        <th>Պահեստի անունը</th>
                        <th>Առաքման ժամկետը</th>

                    </tr>
                    </thead>
                    <tbody id="">
                    @if(isset($requestsToMe) && count($requestsToMe) > 0)
                        @foreach($requestsToMe as $requestToMe)
                            <tr>
                                <td>{{ $requestToMe->good->id }}</td>
                                <td>{{ $requestToMe->good->name }}</td>
                                <td>{{ $requestToMe->good->price }}</td>
                                <td>{{ $requestToMe->quantity }} ({{ $requestToMe->good->measurement }})</td>
                                <td>{{ $requestToMe->fromUser->name }}</td>
                                <td>{{ $requestToMe->time }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="col-lg-12">
                <h3>Հարցումների ցուցակը այլ պահեստներից</h3>
                <table class="table" id="request-from-me-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ապրանքի անունը</th>
                        <th>Արժեքը</th>
                        <th>Քանակը</th>
                        <th>Պահեստի անունը</th>
                        <th>Առաքման ժամկետը</th>
                        <th>Դուրս գրել</th>
                    </tr>
                    </thead>
                    <tbody id="">
                    @if(isset($requestsFromMe) && count($requestsFromMe) > 0)
                        @foreach($requestsFromMe as $requestFromMe)
                            <tr>
                                <td>{{ $requestFromMe->good->id }}</td>
                                <td>{{ $requestFromMe->good->name }}</td>
                                <td>{{ $requestFromMe->good->price }}</td>
                                <td>{{ $requestFromMe->quantity }} ({{ $requestFromMe->good->measurement }})</td>
                                <td>{{ $requestFromMe->toUser->name }}</td>
                                <td>{{ $requestFromMe->time }}</td>
                                <td><span class="glyphicon glyphicon-refresh" aria-hidden="true" data-value="{{$requestFromMe->quantity}}" data-id="{{ $requestFromMe->good->id }}"></span></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <h2 class="err-stock">Պահեստում առկա չէ ապրանքը</h2>
            </div>
            @if(\Auth::user()->isAdmin())
                <div class="col-lg-12">
                    <h3>Պահանջվող ապրանքներ</h3>
                    <table class="table" id="request-main-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ապրանքի անունը</th>
                            <th>Արժեքը</th>
                            <th>Քանակը</th>
                        </tr>
                        </thead>
                        <tbody id="">
                        @if(isset($mainRequests) && count($mainRequests) > 0)
                            @foreach($mainRequests as $mainRequest)
                                <tr>
                                    <td>{{ $mainRequest->good->id }}</td>
                                    <td>{{ $mainRequest->good->name }}</td>
                                    <td>{{ $mainRequest->good->price }}</td>
                                    <td>{{ $mainRequest->quantity }} ({{ $mainRequest->good->measurement }})</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            @endif
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
    </div>
@endsection