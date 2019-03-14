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
        @if(count($errors)>0)
        <div class="alert alert-danger">  <!-- Validation for null fields -->
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(\Session::has('success'))
        <div class="alert alert-success">  <!-- Successfully inserted to database -->
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif

        <div align="right">
            <a href="{{route('employee.index')}}" class="btn btn-primary">Rep Details</a>
            <br/>
            <br/>
        </div>
        <form method="post" action="{{url('employee')}}">
            {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
            <div class="col">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="tel">Telephone Number</label>
                    <input type="text" name="tel" id="tel" class="form-control" placeholder="Integers Only" onkeypress="isInputNumber(event)">
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
                    <input type="date" name="jdate" id="jdate" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="route">Routes</label>
                    <input type="text" name="route" id="route" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="comment">Comments</label>
                    <input type="text" name="comment" id="comment" class="form-control">
                </div>
            </div>
            <div class="row">
            <div class="col-md-6">
        <div class="form-group">
            <input type="submit" class="btn btn-success btn-block">
    </div>
</div>
    <div class="col-md-6">
        <div class="form-group">
            <a href="{{route('employee.create')}}"><input type="efresh" class="btn btn-danger btn-block" value="Refresh"></input></a>
    </div>
</div>
     
</div>
    </div>
    </form>
</body>
</html>