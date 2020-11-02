<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card mt-5">
                        <div class="card-body">

                            <form action="" method="post">
                            {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input class="form-control" type="text" name="first_name" value="">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input class="form-control" type="text" name="last_name" value="">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input class="form-control" type="text" name="username" value="">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>&emsp; &emsp;
                                    <input  type="radio" name="gender" value="male">&emsp; Male &emsp; &emsp;
                                    <input  type="radio" name="gender" value="female">&emsp; Female
                                </div>
                                <div class="form-group">
                                    <label for="date">Birth Date</label>
                                    <input class="form-control" type="text" name="date" value="" id="date">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary btn-submit" type="submit" value="Submit">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
  $( function() {
    $( "#date" ).datepicker({
      dateFormat: "dd-mm-yy"
    });
  } );

  $(document).ready(function() {
        $(".btn-submit").click(function(e){
            e.preventDefault();
       
            var first_name = $("input[name='first_name']").val();
            var last_name = $("input[name='last_name']").val();
            var username = $("input[name='username']").val();
            var gender = $("input[name='gender']").val();
            var date = $("input[name='date']").val();
       
            $.ajax({
                url: "{{ route('my.form') }}",
                type:'POST',
                data: {first_name:first_name, last_name:last_name, username:username, gender:gender, date:date},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });
       
        }); 
</script>
</body>
</html>