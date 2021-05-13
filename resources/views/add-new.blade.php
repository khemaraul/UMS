<!DOCTYPE html>
<html lang="en">
<head>
  <title>UMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/base/jquery-ui.css">
  <link href="{{ asset('css/head.css') }}" rel="stylesheet">
</head>
<body>
@include('layouts.header')
<div class="container" style="padding: 20px;">
    <span style="float: left">User Records</span>
    <span style="float: right"><input type=button onClick=window.open("save-record","Ratting","width=850,height=570,left=150,top=200,toolbar=0,status=0,"); value="Add new"></span><br><br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th><center>Avatar</center></th>
            <th><center>Name</center></th>
            <th><center>Email</center></th>
            <th><center>Experience</center></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($dataShow as $datashow)
        <tr>
            <td style="padding-left: 60px;"><img id="avatar" src="images/{{ $datashow->image }}"></td>
            <td><center>{{ $datashow->name }}</center></td>
            <td><center>{{ $datashow->email }}</center></td>
            <td><center>{{ $datashow->y }} Years {{ $datashow->m }} Months</center></td>
            <td><img src="{{ asset('images/close2.png') }}"><a class="checked" id="id" onclick="onchecked({{ $datashow->id }})">Remove</a></td>
            <!-- <td><img src="{{ asset('images/close2.png') }}"><input type="button" id="btn" value="{{ $datashow->id }}" onclick="alert({{ $datashow->id }})"></td> -->
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@include('layouts.footer')
</body>
<script>
    function onchecked(id){
        $(function() {
            $('.checked').click(function(e) {
                e.preventDefault();
                var dialog = $('<p>Are you sure?</p>').dialog({
                    buttons: {
                        "Yes": function() 
                        {
                            //alert(id);
                            var url = '{{ route("delete.record.post", ":id") }}';
                            url = url.replace(':id', id);
                            window.location.href = url},
                        "Cancel":  function() {
                            dialog.dialog('close');
                        }
                    }
                });
            });
        });
    }
</script>
</html>
