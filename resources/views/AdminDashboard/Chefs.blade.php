@extends('layouts.AdminLayout')


@section('title')
    Chefs
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






    <!-- Modal SEE PIC -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="ShowImgModal">
                    <img width="60%" height="" src="" alt="">
                </div>

            </div>
        </div>
    </div>
    {{-- MODALE ADD NEW CHEF --}}
    <div class="modal fade" id="addChef" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD Chef</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id='testform' enctype="multipart/form-data" method="post"
                        action="{{ route('Dashboard.AddChef') }}"
                        >
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label for="" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="NameADD" id="">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Job:</label>
                            <textarea class="form-control" id="" name="JobADD"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label">Facebook Page:</label>
                            <input type="text" class="form-control" id="" name="FbADD">
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label">Instagram Page:</label>
                            <input type="text" class="form-control" id="" name="IGADD">
                        </div>

                        <div class="form-group">


                            <div class="form-group">
                                <label for="exampleInputFile">Picture :</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="pictureADD" class="custom-file-input"
                                            id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>

                                </div>
                            </div>




                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submit" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>

        </div>
    </div>
    </div>





















    <div class="card">
        <div class="card-header">
            <h3 style="margin-top:10px" class="card-title">Table des Chefs</h3>

            <a onclick="bsCustomFileInput.init()" data-toggle="modal" data-target="#addChef"
                class="btn btn-middle btn-primary" style="float:right">
                <b> + ADD </b>
            </a>


        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name </th>
                        <th>Job Type</th>
                        <th>Facebook Page</th>
                        <th>Instagram Page</th>
                        <th>Image</th>
                        <th style="width: 15%">Action</th>
                    </tr>
                </thead>
                @php
                    $i = 1;
                @endphp
                <tbody>
                    @foreach ($chefs as $chef)
                        <tr>
                            <td> {{ $i++ }} </td>
                            <form id="formUpdate" method="post" action="{{ route('Dashboard.UpdateChef') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <td> <input type="text" name="Name" id="" value=" {{ $chef->Name }} " readonly>
                                </td>

                                <td> <input type="text" name="Job" id="" value=" {{ $chef->Job }}  " readonly>
                                </td>

                                <td> <input type="text" name="Fb" id="" value=" {{ $chef->Fb }}  " readonly> </td>

                                <td> <input type="text" name="IG" id="" value=" {{ $chef->IG }}  " readonly> </td>

                                <td> <img id="#imageChef" data-toggle="modal" data-target="#exampleModal" width="50px"
                                        src="/images/chefs/{{ $chef->Image }}" alt="">
                                    <button id="replaceImg" class="btn-primary btn-xs ">Replace</button>
                                    <input value="/images/chefs/{{ $chef->Image }}" type="file" name="replaceImg" id=""
                                        hidden>
                                </td>


                                <td>

                            </form>
                            <a data-id={{ $chef->id }} id="dlt" class="btn btn-sm btn-danger" data-toggle="modal"
                                href="#ignismyModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </a>

                            <a data-id={{ $chef->id }} id="edit" class="btn btn-sm "
                                style="background-color:orange">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white"
                                    class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>

                            <a data-id={{ $chef->id }} id="update" class="btn btn-sm " data-toggle="modal"
                                href="#ignismyModal" style="background-color:green">

                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white"
                                    class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                    <path
                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                </svg>

                            </a>




                            </td>



                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    @endsection

    @section('script')
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script>
            //Replace Image
            $(document).on('click', '#replaceImg', function(e) {
                e.preventDefault();
                // alert($("input[name=replaceImg]").val());
                $(this).siblings("input[name=replaceImg]").click();


            })

            $(document).on('change', "input[name=replaceImg]", function() {
                // alert($(this).val());
                $(this).siblings('img').fadeOut("slow");
                $(this).siblings('button').text("Image Repaced").delay(500).css("background-color", "red");



            })

            //EDIT BUTTON
            $(document).on('click', '#edit', function() {

                $(this).parents('tr').css('background-color', '#cee3f5').find('input').each(function(e) {
                    $(this).removeAttr('readonly');
                    $(this).css('background-color', '#cee3f5');

                });

                setTimeout(() => {
                    $(this).parents('tr').css('background-color', '').find('input').each(function(e) {
                        $(this).css('background-color', '');

                    })
                }, 500);

            })
            //END EDIT BUTTON

            //Show pic on modal
            $('img').on('click', function() {
                // alert($(this).attr('src'));
                $('.modal-body#ShowImgModal').find('img').attr('src', $(this).attr('src'));



            })
            //ENABLE EDIT FOR ONE INPUT
            $("input:text").on('dblclick', function(e) {

                $(this).removeAttr('readonly');
                // $(this).toggle('disabled');
                $(this).css('background-color', 'gris')

            })


            //DELETE

            $(document).on('click', '#dlt', function() {
                $("#msgModal").text("Deleted Successfully");
                $idChef = $(this).attr('data-id');
                // alert($idChef);
                $(this).parents('tr').fadeOut("3000");
                // $("#msgModal").text("nice");
                $("#success_tic").css("display", "block");
                $("#success_tic").addClass("in");
                $.ajax({
                    type: 'DELETE',
                    url: "{{ route('Dashboard.DeleteChef') }}",
                    data: {
                        "idChef": $idChef,
                        "_token": $("meta[name='csrf-token']").attr("content"),
                    },

                    success: function(data) {
                        console.log("Deleted successfully");
                        $("#success_tic").css("display", "block");
                        $("#success_tic").addClass("in");

                        // console.log(data.success);
                    },
                    error: function(data) {
                        console.log("error");
                        // console.log(data);
                    }
                });

            })
            //Update chefs
            $(document).on('click', "#update", function() {
                $("#msgModal").text("Update Successfully");
                // console.log($(this).attr('data-id'));

                // $("#success_tic").css("display", "block");
                // $("#success_tic").addClass("in");
                // $("#simpleModal").modal('show');
                $form = $(this).parents("tr").find("#formUpdate");
                console.log($form)
                // $(this).parents("tr").find("#formUpdate").submit();
                $form.submit();
            })

            $(document).on('submit', "#formUpdate", function(e) {
                e.preventDefault();

                $idChef = $(this).parent("tr").find("#update").attr("data-id");
                $aha = $(this)
                console.log($(this).parent("tr").find("#update").attr("data-id"));
                var formData = new FormData(this);
                formData.append('idChef', $idChef);
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,



                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data.success);
                        $aha.parents('tr').css('background-color', '#64db30').find('input').each(function(
                        e) {

                            $(this).css('background-color', '#64db30');
                            $aha.parents('tr').find('#replaceImg').text("Replace").css(
                                'background-color', '');
                            // console.log('ahaaa images/menu/'+data.success)

                            if (data.success != "") {
                                $aha.parents('tr').find('img').attr('src', '/images/chefs/' + data
                                    .success).css('display', 'block');

                            }


                            // var newimg=$aha.parents('tr').find('#replaceImg').attr('src');


                        });

                        setTimeout(() => {
                            $aha.parents('tr').css('background-color', '').find('input').each(
                                function(e) {
                                    $(this).css('background-color', '');

                                })
                        }, 800);

                        console.log(data.success);
                    },
                    error: function(data) {
                        console.log("error");
                        // console.log(data);
                    }
                });


            })



            //SUBMIT ADD NEW CHEFS


            $("#testform").on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                console.log(formData);
                // formData.append('title','aha')
                // console.log(formData);

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,



                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log("success");
                        location.reload(true);

                        // console.log(data.success);
                    },
                    error: function(data) {
                        console.log("error");
                        // console.log(data);
                    }
                });
            })


            $("#submit").on('click', function(e) {
                //     // alert("nice");
                $('#testform').submit();
            })


            $(function() {
                bsCustomFileInput.init();
            });
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
