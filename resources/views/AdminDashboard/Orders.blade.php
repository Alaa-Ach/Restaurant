@extends('layouts.AdminLayout')
@section('title')
    Orders
@endsection

@section('content')
    {{-- MODAL DELETED SUCCESSFUL --}}
    <!------ Include the above in your HEAD tag ---------->


    <!--Model Popup starts-->
    <div class="container" id="modala">
        <div class="row">
            <div class="modal fade" id="ignismyModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label=""><span>×</span></button>
                        </div>

                        <div class="modal-body">

                            <div class="thank-you-pop">
                                <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png"
                                    alt="">
                                <h1 id="msgModal">Deleted Succesfully!</h1>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Model Popup ends-->

    {{-- $Users->sortByDesc('created_at') as $User --}}


    <div style="margin:5px;padding:5px" class="accordion" id="accordionExample">
        <div>
            <form action="{{ route('Dashboard.OrdersSearch') }}" method="get">

                <input style="border-radius: 5px;
                            border-width: 5px;
                            padding: 5px;" type="search" name="search" placeholder="Search here">
                <button class="btn btn-primary" id="btnSearch" type="submit">Search</button>
            </form>


        </div>
        <br>
        <div id="table">
            @php
                $i = 0;
            @endphp
            {{-- Start Loop --}}
            @foreach ($Orders->sortByDesc('id') as $Order)
                <div class="accordion-item">

                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $i }}" aria-expanded="true"
                            aria-controls="collapse{{ $i }}">
                            Order #{{ $i++ }} | {{ $Order->created_at }}

                            <span style="position: absolute;right: 50px;">From :
                                {{ $Order->user ? $Order->user->name : 'Deleted Account' }}</span>
                        </button>
                    </h2>
                    <div id="collapse{{ $i - 1 }}" class="accordion-collapse collapse " aria-labelledby="headingOne">
                        <div class="accordion-body">
                            {{-- Form --}}
                            <div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Full name :</label>
                                        <input value="{{ $Order->Fullname }}" readonly type="text" name="Fullname"
                                            class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Phone Number:</label>
                                        <input value="{{ $Order->Phone }}" readonly type="text" name="Phone"
                                            class="form-control" id="inputEmail4">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Address :</label>
                                    <input value="{{ $Order->Address }}" readonly type="text" class="form-control"
                                        id="inputAddress">
                                </div>


                                <div class="form-row ">
                                    <div class="form-group col-md-4 float-left">
                                        <label for="inputCity">City</label>
                                        <input value="{{ $Order->City }}" readonly name="City" type="text"
                                            class="form-control" id="inputCity">
                                    </div>

                                    <div class="form-group col-md-4  ">
                                        <label for="inputZip">Zip</label>
                                        <input value="{{ $Order->Zip }}" readonly name="Zip" type="text"
                                            class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2  ">
                                        <label for="totalOrder">Total Order:</label>
                                        <div class="d-flex">

                                            <input value="{{ $Order->totalOrder }}" readonly type="text"
                                                class="form-control" name="totalOrder" id="totalOrder">
                                            <h6 class="auto-ml" style="margin:auto">DH</h6>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            {{-- End Form --}}
                            {{-- ITEMS --}}
                            <table style="text-align:center;" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Plat </th>
                                        <th style="width:20%">Quantity</th>
                                        <th>Price </th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                @php
                                    $j = 1;
                                @endphp




                                <tbody>
                                    @if ($Order->items)
                                        @foreach ($Order->items as $item)
                                            <tr {{ $item->food->status == 0 ? 'style=background-color:red' : '' }}>
                                                <td> {{ $j++ }} </td>

                                                <td>{{ $item->food->title }}</td>

                                                <td> {{ $item->Quantity }} </td>

                                                <td> {{ $item->food->price }} DH </td>

                                                <td>
                                                    {{ $item->Quantity * $item->food->price }}DH</td>
                                                </td>


                                            </tr>
                                        @endforeach
                                    @endif



                                </tbody>
                            </table>
                            {{-- End Items --}}
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- End Loop --}}

        </div>

        {{-- Start Drop Downs --}}


    </div>
@endsection
@section('script')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        //DELETE

        $(document).on('click', '#dlt', function() {
            $("#msgModal").text("Deleted Successfully");
            idOrder = $(this).attr('data-id');
            $(this).parents('tr').fadeOut("3000");

            $.ajax({
                type: 'DELETE',
                url: "{{ route('Dashboard.DeleteOrder') }}",
                data: {
                    "idOrder": idOrder,
                    "_token": $("meta[name='csrf-token']").attr("content"),
                },

                success: function(data) {
                    console.log("Deleted successfully");
                    $('#ignismyModal').modal('show');

                    // console.log(data.success);
                },
                error: function(data) {
                    console.log("error");
                    // console.log(data);
                }
            });

        })
    </script>
@endsection
@section('style')
    <style>
        /*--thank you pop starts here--*/
        .thank-you-pop {
            width: 100%;
            padding: 20px;
            text-align: center;
        }

        .thank-you-pop img {
            width: 76px;
            height: auto;
            margin: 0 auto;
            display: block;
            margin-bottom: 25px;
        }

        .thank-you-pop h1 {
            font-size: 42px;
            margin-bottom: 25px;
            color: #5C5C5C;
        }

        .thank-you-pop p {
            font-size: 20px;
            margin-bottom: 27px;
            color: #5C5C5C;
        }

        .thank-you-pop h3.cupon-pop {
            font-size: 25px;
            margin-bottom: 40px;
            color: #222;
            display: inline-block;
            text-align: center;
            padding: 10px 20px;
            border: 2px dashed #222;
            clear: both;
            font-weight: normal;
        }

        .thank-you-pop h3.cupon-pop span {
            color: #03A9F4;
        }

        .thank-you-pop a {
            display: inline-block;
            margin: 0 auto;
            padding: 9px 20px;
            color: #fff;
            text-transform: uppercase;
            font-size: 14px;
            background-color: #8BC34A;
            border-radius: 17px;
        }

        .thank-you-pop a i {
            margin-right: 5px;
            color: #fff;
        }

        #ignismyModal .modal-header {
            border: 0px;
        }

        /*--thank you pop ends here--*/

    </style>
@endsection
