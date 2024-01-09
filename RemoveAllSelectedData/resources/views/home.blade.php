<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Removed Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
    <div class="container">
        @if($message = Session::get('success'))
        <div class="alert alert-info">
            <p>{{$message}}</p>
        </div>
        @endif
        <h3 class="text-center m-4">Delete Multiple Data Using checkbox Using Ajax And jquery</h3>
        <button class="btn btn-primary btn-xs removeAll mb-3">Remove Selected Data</button>
        <table class="table table-bordered">
<tr>
    <th><input type="checkbox" id="checkboxMain"></th>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
</tr>
@if($users->count())
@foreach($users as $key=>$res)
<tr id="tr_{{$res->id}}">
    <td><input type="checkbox" class="checkbox" data-id="{{$res->id}}"></td>
    <td>{{++$key}}</td>
    <td>{{$res->name}}</td>
    <td>{{$res->email}}</td>
</tr>
@endforeach
@endif
        </table>
    </div>
    





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
$('#checkboxMain').on('click',function(e){
    if($(this).is(':checked',true)){
        $(".checkbox").prop('checked',true);
    }
    else{
        $(".checkbox").prop('checked',false);
    }
});

$('#checkbox').on('click',function(){
    if($('.checkbox:checked').length == $('.checkbox').length){
        $(".checkboxMain").prop('checked',true);
    }
    else{
        $(".checkboxMain").prop('checked',false);
    }
});

$('.removeAll').on('click',function(e){
  var userIdArr = [];
  $('.checkbox:checked').each(function(){
  userIdArr.push($(this).attr('data-id'));
  });
  if(userIdArr.length <=0 ){
    alert('choose min one item to remove..');
  }
  else {
    if (confirm("Are you sure to delete..")) {
        var stuId = userIdArr.join(",");
        $.ajax({
            url: "{{ url('delete-all') }}",
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: 'ids=' + stuId,
            success: function (data) {
                alert("User successfully Removed..");
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
    }
}

});
        });
    </script>
</body>
</html>