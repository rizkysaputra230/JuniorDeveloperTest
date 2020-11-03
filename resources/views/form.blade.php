<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <style media="screen">
        .register {
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }
        .card {
            padding: 48px;
            border-radius: 16px;
            box-shadow: 0 0 14px 0 rgba(0, 0, 0, 0.175);
            border: none;
        }
        .btn {
            border-radius: 8px;
            font-weight: 500;
        }
        .btn-primary:not(:disabled):not(.disabled):active:focus.btn-primary:not(:disabled):not(.disabled):active:focus {
            box-shadow: none;
        }
        .btn:disabled {
            background-color: #e6e7e8 !important;
            color: #aaa !important;
            border: none !important;
        }
        .form-control {
            border-radius: 8px;
            outline: none !important;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .form-group {
            margin-bottom: 24px;
        }
        .form-group:last-child {
            margin-bottom: 0;
        }
    </style>
    <div class="register">
        <div class="col-lg-4 col-10 mx-auto">
            <div class="card">
                <div class="alert alert-danger error-messages" style="display:none">
                    <ul></ul>
                </div>
                <form id="userForm" method="post">


                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input class="form-control" type="text" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input class="form-control" type="text" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="maleOption" value="male">
                            <label class="form-check-label" for="maleOption">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="femaleOption" value="female">
                            <label class="form-check-label" for="femaleOption">
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="birth">Birth Date</label>
                        <input class="form-control" type="date" name="birth_date">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="terms" id="tncCheck" value="1">
                            <label class="form-check-label" for="tncCheck">
                                I Agree with <a href="#">Terms</a> and <a href="#">Condition</a>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ csrf_field() }}
                        <button class="btn btn-primary btn-block" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#userForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                data: $(this).serialize(),
                url: '{{ route("store.form") }}',
                method: 'post',
                dataType: 'json',
                beforeSend: function () {
                    $('#userForm [type="submit"]').prop('disabled', true);
                },
                success: function(response) {
                    $('.error-messages ul').html('');
                    $('.error-messages').fadeOut();
                    $('#userForm input').val('');
                    setTimeout(function () {
                        $('#userForm [type="submit"]').prop('disabled', false);
                    }, 1000);
                    alert(response.message);
                },
                error: function (xhr) {
                    printErrorMsg(xhr.responseJSON.message);
                    setTimeout(function () {
                        $('#userForm [type="submit"]').prop('disabled', false);
                    }, 1000);
                },
                failed: function () {
                    setTimeout(function () {
                        $('#userForm [type="submit"]').prop('disabled', false);
                    }, 1000);
                }
            });
        });

        function printErrorMsg(error) {
            $('.error-messages ul').html('');
            for (var i = 0; i < error.length; i++) {
                $('.error-messages ul').append('<li>' + error[i] + '</li>');
            }
            $('.error-messages').fadeIn();
        }
    </script>
</body>
</html>
