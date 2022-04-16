@extends('layouts.UserLayout')

{{-- HIIIIIIIIIIIIIi --}}
{{-- {{dd($carts)}} --}}
{{-- {{$carts->first()}} --}}
@section('content')
    {{-- <div class="" style="height: 1000px; width:80%"> --}}
    {{-- <div class="row"> --}}


    {{-- </div> --}}


    {{-- MODAL DELETED SUCCESSFUL --}}
    <!------ Include the above in your HEAD tag ---------->


    <!--Model Popup starts-->
    <div class="container" id="modala">
        <div class="row">
            <div class="modal fade" id="ignismyModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button"  class="close" data-dismiss="modal"
                                aria-label=""><span >×</span></button>
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
























    <div id="top">
        <div class="container-fluid">
            {{-- <section class="section" id=""> --}}
            <div class="container">
                <div class="row">


                    <div class="card" style="width:100%;height:100%">
                        <div class="card-header">
                            <h3 style="margin-top:10px" class="card-title">Cart</h3>




                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table style="text-align:center;" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Plat </th>
                                        <th style="width:20%">Quantity</th>
                                        <th>Price </th>
                                        <th>Total</th>
                                        <th style="width: 15%">Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $i = 1;
                                @endphp
                                <tbody>
                                    @foreach (Auth::user()->Cart as $cart)
                                        @if ($cart->food->status == 1)
                                            <tr>
                                                <td> {{ $i++ }} </td>
                                                <form id="formUpdate" method="post"
                                                    action="{{ route('Dashboard.UpdatePlat') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('post')
                                                    <td> {{ $cart->food->title }}
                                                    </td>

                                                    <td> <input min=1 type="number" id-Plat="{{ $cart->food->id }}"
                                                            name="Quantity" id="" value="{{ $cart->Quantity }}">
                                                    </td>

                                                    <td id='price'> {{ $cart->food->price }} DH
                                                    </td>

                                                    <td id='total'>{{ $cart->Quantity * $cart->food->price }}DH</td>
                                                    </td>

                                                    <td>

                                                </form>
                                                <a data-id={{ $cart->id }} id-Plat="{{ $cart->food->id }}" id="dlt"
                                                    class="btn btn-sm btn-danger" href="#ignismyModal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg>
                                                </a>

                                                </td>



                                            </tr>
                                        @endif
                                    @endforeach


                                </tbody>
                            </table>
                        </div>

                        <div class="card-body">
                            <p style="text-align:center">
                                <button id="BtnCheckOut" class="btn btn-primary " style="width:80%">
                                    Checkout
                                </button>

                            </p>
                            <div class="collapse" id="CheckOutCollapse">
                                <div class="card card-body">


                                    <form id="FormOrder" action="{{ Route('OrderNow') }}" method="post"
                                        enctype="multipart/form-data" method="post">
                                        @csrf
                                        @method('post')
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Full name :</label>
                                                <input type="text" name="Fullname" class="form-control" id="inputEmail4">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Phone Number:</label>
                                                <input type="text" name="Phone" class="form-control" id="inputEmail4">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress">Address :</label>
                                            <input type="text" name="Address" class="form-control" id="inputAddress"
                                                placeholder="1234 Main St, Apartment, studio, or floor">
                                        </div>

                                        {{-- <div class="d-flex form-row "> --}}
                                        <div class="form-row ">
                                            <div class="form-group col-md-4 float-left">
                                                <label for="inputCity">City</label>
                                                <input name="City" type="text" class="form-control" id="inputCity">
                                            </div>

                                            <div class="form-group col-md-4  ">
                                                <label for="inputZip">Zip</label>
                                                <input name="Zip" type="text" class="form-control" id="inputZip">
                                            </div>
                                            <div class="form-group col-md-2  ">
                                                <label for="totalOrder">Total Order:</label>
                                                <div class="d-flex">

                                                    <input readonly type="text" class="form-control" name="totalOrder"
                                                        id="totalOrder">
                                                    <h6 class="auto-ml" style="margin:auto">DH</h6>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="form-group ">

                                        </div>
                                        <button id="OrderNow" class="btn btn-primary">Order Now</button>
                                    </form>


                                </div>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
            {{-- </section> --}}
        </div>
    </div>
@endsection


@section('script')
    <script>

        $('#exitModal').on('click', function(){
            $('#ignismyModal').modal('hide');
            location.reload();
        })
        $('document').ready(function() {
            CheckRow();
        })




        function CheckRow() {

            rowCount = $('tbody tr').length;
            console.log(rowCount);
            if (rowCount == 0) {
                // $('#BtnCheckOut').attr('disabled','');
                $('#CheckOutCollapse .card').html('<h1 style="color:grey">You Cart Is Empty</h1>');
                $('#CheckOutCollapse .card').css({
                    "min-height": "auto",
                    "text-align": "center"
                });

            }

        }



        function initTotalOrder() {
            totalOrder = 0;
            $('td#total').each(function() {

                totalOrder += parseInt($(this).text());
                // console.log( );

            })
            // console.log(  totalOrder);
            $('input#totalOrder').val(totalOrder);
        }
        //btn collapse
        $('#BtnCheckOut').on('click', function() {



            initTotalOrder();
            $("#CheckOutCollapse").collapse("toggle");
        })
        //Change quantity

        $("input[name='Quantity']").on("change", function() {
            Quantity = $(this).val();
            $idUser = {{ Auth::user()->id }};
            $idPlat = $(this).attr('id-Plat');
            row = $(this).parents('tr');


            // alert($idPlat);
            //Update QUantity
            $.ajax({
                type: 'POST',
                url: "{{ route('UpdateQuantity') }}",
                data: {
                    "idUser": $idUser,
                    "idPlat": $idPlat,
                    "Quantity": Quantity,

                    "_token": "{{ csrf_token() }}",
                },

                success: function(data) {
                    console.log("Updated successfully");
                    // $total=$(this);
                    price = row.find('#price').text().replace("DH", '');
                    total = price * Quantity;
                    row.find('#total').text(total + "DH");
                    // $("#success_tic").css("display", "block");
                    // $("#success_tic").addClass("in");

                    initTotalOrder();
                    // console.log(data.Msg);
                },
                error: function(data) {
                    console.log("error");
                    // console.log(data);
                }
            });

        })

        //OrderNow
        //Button
        $('#OrderNow').on('click', function(e) {
            e.preventDefault();
            $('#FormOrder').submit();

        })

        //Submit Form
        $('#FormOrder').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            //    alert('hi');
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,


                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log("Form Sent successfully");
                    $('#CheckOutCollapse').collapse('hide');
                    $('#FormOrder').trigger('reset');
                    $("#msgModal").text("Order Sent successfully");

                    $('#ignismyModal').modal('show');
                    location.reload();
                },
                error: function(data) {
                    console.log("error");
                }
            });

        })

        //DELETE

        $(document).on('click', '#dlt', function() {
            $("#msgModal").text("Deleted Successfully");
            $idUser = {{ Auth::user()->id }};
            $idPlat = $(this).attr('id-Plat');
            $(this).parents('tr').remove();
            setTimeout(() => {
                $(this).parents('tr').remove();
            }, 3000);
            CheckRow();
            // $(this).parents('tr').remove();
            // $("#msgModal").text("nice");
            // $("#success_tic").css("display", "block");
            // $("#success_tic").addClass("in");
            $.ajax({
                type: 'DELETE',
                url: "{{ route('DltPlatCart') }}",
                data: {
                    "idPlat": $idPlat,
                    "idUser": $idUser,

                    "_token": "{{ csrf_token() }}",
                },

                success: function(data) {
                    console.log("Deleted successfully");
                    $("#msgModal").text("Plat Deleted successfully");

                    $('#ignismyModal').modal('show');
                    initTotalOrder();
                    // $("#success_tic").css("display", "block");
                    // $("#success_tic").addClass("in");

                    // console.log(data.success);
                },
                error: function(data) {
                    console.log("error");
                    // console.log(data);
                }
            });

        })




        //SUBMIT ADD NEW PLATS
    </script>
@endsection
