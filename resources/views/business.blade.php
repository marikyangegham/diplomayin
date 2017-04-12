@extends('layout_admin')

@section('business-container')
    <?php
    $totalPriceInput = 0;
    $totalPriceOutput = 0;
    $totalPriceReturn = 0;
    ?>
        <div class="col-lg-12">
            <h3>Վերադարձված ապրանքները</h3>
            <table class="table" id="table-returned">
                <thead>
                <tr>
                    <th>Ապրանքի անվանումը</th>
                    <th>Քանակը</th>
                    <th>Արժեքը</th>
                </tr>
                </thead>
                <tbody id="category-table">
                @if(!empty($returnedGoods))
                    @foreach($returnedGoods as $returnedGood)
                        <?php
                        $price = $returnedGood->good->price * $returnedGood->quantity;
                        $totalPriceReturn += $price;
                        ?>
                        <tr>
                            <td>{{$returnedGood->good->name}}</td>
                            <td>{{$returnedGood->quantity}}({{$returnedGood->good->measurement}})</td>
                            <td>{{$returnedGood->good->price * $returnedGood->quantity}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th>{{$totalPriceReturn }}</th>
                </tr>
                </tfoot>
            </table>

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
        <div class="col-lg-12">
            <h3>Ներմուծված ապրանքները</h3>
            <table class="table" id="table-input">
                <thead>
                <tr>
                    <th>Ապրանքի անվանումը</th>
                    <th>Քանակը</th>
                    <th>Արժեքը</th>
                </tr>
                </thead>
                <tbody id="category-table">
                @if(!empty($inputtedGoods))
                    @foreach($inputtedGoods as $inputtedGood)
                        <?php
                        $price = $inputtedGood->good->price * $inputtedGood->quantity;
                        $totalPriceInput += $price;
                        ?>
                        <tr>
                            <td>{{$inputtedGood->good->name}}</td>
                            <td>{{$inputtedGood->quantity}}({{$inputtedGood->good->measurement}})</td>
                            <td>{{$inputtedGood->good->price * $inputtedGood->quantity}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th>{{$totalPriceInput }}</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <div>
            <h3>Դուրս գրված ապրանքներ</h3>
            <table class="table" id="table-output">
                <thead>
                <tr>
                    <th>Ապրանքի անվանումը</th>
                    <th>Քանակ</th>
                    <th>Արժեքը</th>
                </tr>
                </thead>
                <tbody id="category-table">
                @if(count($outputtedGoods) > 0)
                    @foreach($outputtedGoods as $outputtedGood)
                        <?php
                        $price = ($outputtedGood->good->price + $outputtedGood->good->price * 10/100) *  $outputtedGood->quantity;
                        $totalPriceOutput += $price;
                        ?>
                        <tr>
                            <td>{{$outputtedGood->good->name}}</td>
                            <td>{{$outputtedGood->quantity}} ({{$outputtedGood->good->measurement}}) </td>
                            <td>{{($outputtedGood->good->price + $outputtedGood->good->price * 10/100) * $outputtedGood->quantity }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th>{{$totalPriceOutput }}</th>
                </tr>
                </tfoot>
            </table>
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
    <div class="col-lg-offset-4 col-lg-8 border">
        <div class="col-lg-3">
            <h3>Եկամուտ</h3>
            <h4>{{$totalPriceOutput + $totalPriceReturn}}</h4>
        </div>
        <div class="col-lg-3">
            <h3>Ծախսեր</h3>
            <h4>{{$totalPriceInput + $totalPriceOutput*3/100}}</h4>
        </div>
        <div class="col-lg-3">
            <h3>Ավելացված արժեքի հարկ</h3>
            <h4>{{$totalPriceOutput*3/100}}</h4>
        </div>
        <div class="col-lg-3">
            <h3>Շահույթ</h3>
            <h4>{{$totalPriceOutput + $totalPriceReturn - ($totalPriceInput + $totalPriceOutput*3/100)}}</h4>
        </div>
    </div>



@endsection