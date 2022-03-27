@extends('layouts.AdminLayout')


@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Table des utilisateurs</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Nom </th>
            <th>E-mail</th>
            <th style="width: 15%" >Action</th>
          </tr>
        </thead>
        @php
            $i=1;
        @endphp
        <tbody>
            @foreach ($users as $user)



            <tr >
                <td>{{$i++}}</td>
                <td>{{$user->name}}</td>
                <td>
                    {{$user->email}}
                </td>
                <td >


                    @if ($user->usertype==0)

                    <a  data-id={{$user->id}} id="dlt" class="btn btn-sm btn-danger">Supprimer</a>
                    @else

                        <button  class="btn btn-sm btn-danger" disabled="disabled">Supprimer</button>
                    @endif
                </td>
              </tr>

            @endforeach


        </tbody>
      </table>
    </div>
    <!-- /.card-body -->

  </div>

@section('script')
  <script>

$(document).on("click",'#dlt',function(e){
    // e.preventdefault();
    $(this).parents('tr').hide();
    // alert(e.next("input").val());
    // $idUser=$(this).siblings("input").val();
    $idUser=$(this).data("id");
    console.log($idUser);

    $.ajax(

{

// url: "users/"+id,
// url: "users/delete",
url: "{{route('Dashboard.userDelete')}}",

type: 'DELETE',

data: {

    "id": $idUser,

    "_token":$("meta[name='csrf-token']").attr("content"),

},

success: function (success){

    console.log("User Deleted Succesfully");


}

});





})




  </script>
  @endsection
@endsection
