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
  <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <link href="{{ asset('css/head.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">

    <div class="panel panel-primary">
      <div class="panel-heading"></div>
      <div class="panel-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="images/{{ Session::get('image') }}">
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('save.record.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bootstrap-iso">
            <div class="container-fluid" style="padding-top:25px;padding-bottom:25px;padding-left:75px;padding-right:25px;">
            <div class="row">
                <label class="col-xs-3" style="padding-top:10px;">Email</label>
                <div class="col-xs-6">
                    <input type="email" name="email" class="form-control">
                </div>
            </div><br>
            <div class="row">
                <label class="col-xs-3" style="padding-top:10px;">Full Name</label>
                <div class="col-xs-6">
                    <input type="text" name="name" class="form-control">
                </div>
            </div><br>
            <div class="row">
                <label class="col-xs-3" for="date" style="padding-top:10px;">Date of Joining</label>
                <div class="col-xs-6">
                    <!-- <label>Date of Joining</label> --> <!-- Date input -->
                        <input class="form-control" id="joindate" name="joindate" placeholder="DD-MM-YYY" type="date"/>
                </div>
            </div><br>
            <div class="row">
                <label class="col-xs-3" for="date" style="padding-top:10px;">Date of Leaving</label>
                <div class="col-xs-4">
                    <input class="form-control" id="leavedate" name="leavedate" placeholder="DD-MM-YYY" type="date"/>
                </div>
                <div class="col-xs-3" style="padding-top:10px;">
                <input class="form-check-input" type="checkbox" name="working" value="1" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Still Working
                </label>
                </div>
            </div><br>
            <!-- <div class="row">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="working" value="1" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Still Working
                </label>
            </div>
            </div> -->
            <div class="row">
                <label class="col-xs-3" for="date" style="padding-top:10px;">Upload Image</label>
                <div class="col-xs-6">
                    <input type="file" name="image" class="form-control">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6" style="padding-left:160px;">
                    <center><button type="submit" style="width:80px;">Save</button></center>
                </div>
            </div>
            </div>
            </div>
        </form>

      </div>
    </div>
</div>
<script>
    // $(document).ready(function(){
    //   var date_input=$('input[name="joindate"]'); //our date input has the name "date"
    //   var date_input1=$('input[name="leavedate"]'); //our date input has the name "date"
    //   var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    //   var options={
    //     format: 'dd-mm-yyyy',
    //     container: container,
    //     todayHighlight: true,
    //     autoclose: true,
    //   };
    //   date_input.datepicker(options);
    //   date_input1.datepicker(options);
    // })
    function yearsOfExp(){
        var df = document.getElementById("joindate").value;
        var df = document.getElementById("leavedate").value;
        var startMonth = df.getFullYear() * 12 + df.getMonth();
        alert(startMonth);  
        var endMonth = dt.getFullYear() * 12 + dt.getMonth();
        var monthInterval = (endMonth - startMonth);
        alert(monthInterval);
    }
</script>
