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
                    <h1 class="p-2">{{ $title }}</h1>
                    <div class="mt-4 mb-4 border-bottom-black border-top-black">
                        <button type="button" class="btn btn-small btn-dark" onclick="">New User</button>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                   <div id="dataTableErrorContainer">
                    <ul class="text-danger" id="dataTableErrorsUI"></ul>
                   </div>
                </div>
                <div class="col-12">
                    <table id="dataTable" class="table table-striped table-borded responsive text-dark w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbodt>
                    </table>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/dashboard.js') }}"></script>
        <script src="https://cdn.datatables.net/v/bs5/dt-1.13.10/r-2.5.0/datatables.min.js"></script>
        <script>
            let tableUrl = "/api/dashboard/users/index";
            
            function createDataTable(tableId, url, columns) {
                return $("#" + tableId).dataTable({
                    ajax: {
                        url: url,
                        type: "GET",
                        complete: function(jqXHR) {
                            if(jqXHR.status === 200){
                                $("#dataTableErrorsUI").empty();
                                $("#dataTableErrorContainer").hide();
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            $("#dataTableErrorsUI").empty();
                            $("#dataTableErrorsUI").append(
                                "<li>An error occured, Please try later</li>"
                            );
                            $("#dataTableErrorContainer").show();
                        }
                    },
                    pageLength: 10,
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    deferRender: true,
                    columns: columns
                });
            }

            $(document).ready(function() {
                let dataTable = createDataTable(
                    "dataTable",
                    tableUrl,
                    [
                        {
                            data: "name",
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: "email",
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: "actions",
                            orderable: true,
                            searchable: true,
                            className: "text-end"
                        }
                    ]
                );
            });
        </script>
    </body>
</html>