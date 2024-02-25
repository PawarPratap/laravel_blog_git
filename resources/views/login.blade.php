<!DOCTYPE html>
<html>
    <head>
        @include("layout.head")
    </head>
    <body class="">
        @include("layout.navbar")
        <div class="container">
            <div class="row justify-content-center p-3">
                <div class="col-12">
                    <h1 class="text-dark text-center">Welcome back</h1>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-5 text-center">
                    <form name="login" class="mt-2">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-12">
                                <div id="formErrors" class="alert alert-danger text-start" role="alert" style="display:none;">
                                    <ul class="m-0">
                                    
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <lable>Email</label>
                                    <input id="email" type="email" class="form-control">
                                </div>
                            </div> 
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <lable>Password</label>
                                    <input id="password" type="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <button id="signInButton" type="button" class="btn btn-dark font-weight-bolder w-100">
                                    Sign In
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            let loginSubmitted = false;

            function clearErrors() {
                $("#formErrors ul").empty();
                $("#formErrors ul").hide();
            }

            function addErrors(errorArray) {
                if(Array.isArray(errorArray) && errorArray.length > 0){
                    for(let i=0; i<errorArray.length; i++){
                        $("#formErrors ul").append("<li>" + errorArray[i] + "</li>");
                    }  
                    
                    $("#formErrors ul").show();
                }
            }

            function formatErrors(errorArray){
                let errorList =[];

                for(var key in errorArray){
                    if(errorArray.hasOwnProperty(key)){
                        errorList.push(errorArray[key]);
                    }
                }
                return errorList;
            }

            $(document).ready(function(){
                $("#signInButton").click(function(e) {
                    e.preventDefault();

                    clearErrors();

                    if(loginSubmitted !== true){
                        loginSubmitted = true;
                    }
                    
                    $.post({
                        "url": "api/login",
                        "data": {
                            "_token" : "{{ csrf_token() }}",
                            "email": $("#email").val(),
                            "password": $("#password").val()
                        },
                        sucess: function response(){ console.log('in success');
                        loginSubmitted = false;
                        window.location.href = "/dashboard";
                        },
                        error: function (response) {
                            loginSubmitted = false;
                            if(response.status == 422) {
                                addErrors(formatErrors(response.responseJSON.errors));
                            } else {
                                addErrors("Unable to process request");
                            }
                        }
                    });
                });
            });
        </script>
    </body>
</html>