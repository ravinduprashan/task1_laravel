<!DOCTYPE html>
<html>
<head>
    <title>Sales Force Automation</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="jumbotron">
        <h1><center>Sales Force Automation</center></h1>
    </div>
</div>
<div class="container">
        <br/>
        <h3>Edit Records</h3>
        <br/>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="{{action('emp_control@update',$id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH" />
<div class="row">
            <div class="col-md-6">
            <div class="col">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$employee->name}}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{$employee->email}}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="tel">Telephone Number</label>
                    <input type="text" name="tel" id="tel" class="form-control" value="{{$employee->tel}}" onkeypress="isInputNumber(event)">
                    <!--JavaScript validation for only int-->
                    <script>
                        function isInputNumber(evt){
                            var ch = String.fromCharCode(evt.which);
                            if(!(/[0-9]/.test(ch))){
                                evt.preventDefault();
                            }
                        }
                    </script>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="col">
                <div class="form-group">
                    <label for="jdate">Joined Date</label>
                    <input type="date" name="jdate" id="jdate" class="form-control" value="{{$employee->jdate}}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="route">Routes</label>
                    <input type="text" name="route" id="route" class="form-control" value="{{$employee->route}}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="comment">Comments</label>
                    <input type="text" name="comment" id="comment" class="form-control" value="{{$employee->comment}}">
                </div>
            </div>
            <div class="row">
                
            <div class="col-md-12">
        <div class="form-group">
            <input type="submit" class="btn btn-success btn-block" value="Save" />
      </div>
    
</div>
        
    </div>
</div>
    </div>
    </form>
</body>
</html>

