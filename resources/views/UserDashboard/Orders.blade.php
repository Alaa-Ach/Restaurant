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






















    <div id="top">



        <div class="container-fluid">
            {{-- <section class="section" id=""> --}}
            <div class="container">
                <div class="row">


                    <div class="card" style="width:100%;height:100%">
                        <div class="card-header">
                            <h3 style="margin-top:10px" class="card-title">Orders : </h3>




                        </div>
                        <!-- /.card-header -->
                        {{-- CARD BODY --}}

                        <div style="margin:5px;padding:5px" class="accordion" id="accordionExample">
                            @php
                                $Orders = Auth::user()->FormOrder;
                                $i = 0;
                            @endphp
                            {{-- Start Drop Downs --}}
                            {{-- Start Loop --}}
                            @foreach ($Orders->sortByDesc('id') as $Order)
                                <div class="accordion-item">

                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $i }}" aria-expanded="true"
                                            aria-controls="collapse{{ $i }}">
                                            Order #{{ $i++ }} | {{ $Order->created_at }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $i - 1 }}" class="accordion-collapse collapse "
                                        aria-labelledby="headingOne">
                                        <div class="accordion-body">
                                            {{-- Form --}}
                                            <div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Full name :</label>
                                                        <input value="{{ $Order->Fullname }}" readonly type="text"
                                                            name="Fullname" class="form-control" id="inputEmail4">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Phone Number:</label>
                                                        <input value="{{ $Order->Phone }}" readonly type="text"
                                                            name="Phone" class="form-control" id="inputEmail4">
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label for="inputAddress">Address :</label>
                                                    <input value="{{ $Order->Address }}" readonly type="text"
                                                        class="form-control" id="inputAddress">
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
                                                            <tr
                                                                {{ $item->food->status == 0 ? 'style=background-color:red' : '' }}>
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



                    </div>
                </div>
            </div>
            {{-- </section> --}}
        </div>
    </div>
@endsection

@section('script')
    <script>
        // $('.collapse').collapse();
        // $('#testa').on('click', function() {
        //     // CartExist=$(this).attr('CartExist')
        //     $('#collapseExample').collapse('toggle');
        //     // if(CartExist=0){
        //     //     alert(CartExist);
        //     // }

        //     //  console.log('ahaa')

        // })
    </script>
@endsection
