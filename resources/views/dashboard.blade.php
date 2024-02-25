<!DOCTYPE html>
<html>
    <head>
        @include('dashboard.layout.head')
    </head>
    <body class="">
        @include('dashboard.layout.navbar')
        <div class="container ps-5 pe-5">
            <div class="row">
                <div class="col-12 p-2 text-left text-dark mt-4">
                    <h1 class="p-2">Dashboard</h1>
                    <div class="mt-4 mb-4 border-bottom-black border-top-black">
                        <button type="button" class="btn btn-small btn-dark" onclick="">New Action</button>

                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/dashboard.js') }}"></script>
    </body>
</html>