@extends('dashboard.dashboard-layouts.master')

@section('title')
    HM-Clinic
@stop
@section('content')
    <div class="content pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#profile" data-toggle="tab">
                                                <i class="material-icons"></i> Requests
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#messages" data-toggle="tab">
                                                <i class="material-icons"></i> Requests accepted
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#request" data-toggle="tab">
                                                Executed Requests
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#all" data-toggle="tab">
                                                All Requests
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile">
                                    <div class="table-responsive ">
                                        <table class="table table1" id="table table1" data-toggle="table" data-search="true"
                                            data-pagination="true" data-toolbar="#toolbar">
                                            <thead class=" text-primary">
                                                <th data-sortable="true">ID</th>
                                                <th>Phone Number</th>
                                                <th>Accept</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($orders as $order)
                                                    <tr data-row="{{ $order->id }}">
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $order->phone_number }}</td>
                                                        <td class="icon">
                                                            <a class="material-symbols-outlined text-success accepted-order"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal-accept-request"
                                                                aria-hidden="true"
                                                                data-order="{{ $order->id }}">swipe_right</a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane" id="messages">
                                    <div class="table-responsive ">
                                        <table class="table table2" id="table" data-toggle="table" data-search="true"
                                            data-pagination="true" data-toolbar="#toolbar">
                                            <thead class=" text-primary">
                                                <th data-sortable="true">ID</th>
                                                <th>Paramedics Name</th>
                                                <th>Car Number</th>
                                                <th>Number</th>
                                                <th>Done</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($accepted as $accept)
                                                    <tr data-row="{{ $accept->id }}">
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $accept->paramedic->fname }} {{ $accept->paramedic->lname }}
                                                        </td>
                                                        <td>{{ $accept->paramedic->car_number }}</td>
                                                        <td>{{ $accept->phone_number }}</td>
                                                        <td class="icon">
                                                            <a class="material-symbols-outlined text-success executed-order"
                                                                data-toggle="modal" data-target="#exampleModal-done-request"
                                                                aria-hidden="true"
                                                                data-executed="{{ $accept->id }}">ambulance</a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane" id="request">
                                    <div class="table-responsive ">
                                        <table class="table table3" id="table" data-toggle="table" data-search="true"
                                            data-pagination="true" data-toolbar="#toolbar">
                                            <thead class=" text-primary">
                                                <th data-sortable="true">ID</th>
                                                <th>Paramedics Name</th>
                                                <th>Car Number</th>
                                                <th>Number</th>
                                                <th>Created at</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($executed as $execut)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $execut->paramedic->fname }}
                                                            {{ $execut->paramedic->lname }}
                                                        </td>
                                                        <td>{{ $execut->paramedic->car_number }}</td>
                                                        <td>{{ $execut->phone_number }}</td>
                                                        <td>{{ $execut->created_at }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane" id="all">
                                    <div class="table-responsive ">
                                        <table class="table table4" id="table" data-toggle="table" data-search="true"
                                            data-pagination="true" data-toolbar="#toolbar">
                                            <thead class=" text-primary">
                                                <th data-sortable="true">ID</th>
                                                <th>Paramedics Name</th>
                                                <th>Car Number</th>
                                                <th>Number</th>
                                                <th>Created at</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($executedAll as $executed)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $executed->paramedic->fname }}
                                                            {{ $executed->paramedic->lname }}
                                                        </td>
                                                        <td>{{ $executed->paramedic->car_number }}</td>
                                                        <td>{{ $executed->phone_number }}</td>
                                                        <td>{{ $executed->created_at }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal-done-request" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog small-size" role="document">
                <div class="modal-content dark-edition">
                    <div class="modal-header modal-border-bottom">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            onclick="cancel()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="executed-id">
                        <p class="text-white">The Request Has Been Done</p>
                    </div>
                    <div class="modal-footer modal-border-top">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"
                            id="executedOrder">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal-accept-request" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog small-size" role="document">
                <div class="modal-content dark-edition">
                    <div class="modal-header modal-border-bottom">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            onclick="cancel()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="order-id">
                        <p class="text-white">The Request Has Been Executed </p>
                    </div>
                    <div class="modal-footer modal-border-top">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"
                            id="acceptedOrder">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        // Accepted
        let orderId = '';
        $(document).on('click', '.accepted-order', function() {
            orderId = $(this).data('order');
            $('#order-id').val(orderId);
        });
        $(document).on('click', '#acceptedOrder', function() {
            $.ajax({
                type: "post",
                url: '/paramedic/ambulance_order/update/' + orderId,
                contentType: false,
                processData: false,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);

                    toastr.success('The request has been successfully accepted');

                    let newRow = '<tr data-row="' + response.data.order[0].id + '">' +
                        '<td>' + response.data.order[0].paramedic.id + '</td>' +
                        '<td>' + response.data.order[0].paramedic.fname + ' ' + response.data.order[0]
                        .paramedic.lname + '</td>' +
                        '<td>' + response.data.order[0].paramedic.car_number + '</td>' +
                        '<td>' + response.data.order[0].phone_number + '</td>' +
                        '<td class="icon">' +
                        '<a class="material-symbols-outlined text-success executed-order" data-toggle="modal" data-target="#exampleModal-done-request" aria-hidden="true" data-executed="' +
                        response.data.order[0].id + '">ambulance</a>' +
                        '</td>' +
                        '</tr>';
                    $(".no-records-found").remove();
                    $(".table2 tbody").append(newRow);

                    let rowToDelete = $('.table1 tbody tr[data-row="' + response.data.order[0].id +
                        '"]').closest('tr');
                    rowToDelete.remove();
                },
                error: function(error) {
                    console.log(error);
                    @if (Auth::guard('secretary')->check())
                        toastr.error('The request was not accepted.');
                    @else
                        toastr.error('You do not have permission.');
                    @endif
                }
            });
        });

        // Executed
        let executed = '';
        $(document).on('click', '.executed-order', function() {
            executed = $(this).data('executed');
            $('#executed-id').val(executed);
        });
        $(document).on('click', '#executedOrder', function() {

            $.ajax({
                type: "post",
                url: '/paramedic/ambulance_order/execute/' + executed,
                contentType: false,
                processData: false,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                    toastr.success('The request has been executed successfully.');

                    let newRow = '<tr>' +
                        '<td>' + response.data.order[0].paramedic.id + '</td>' +
                        '<td>' + response.data.order[0].paramedic.fname + ' ' + response.data.order[0]
                        .paramedic.lname + '</td>' +
                        '<td>' + response.data.order[0].paramedic.car_number + '</td>' +
                        '<td>' + response.data.order[0].phone_number + '</td>' +
                        '<td>' + response.data.created_at + '</td>' +
                        '</tr>';
                    $(".no-records-found").remove();
                    $(".table3 tbody").append(newRow);

                    let rowToDelete2 = $(".table2 tbody tr[data-row='" +
                        response.data.order[0].id + "']");

                    rowToDelete2.remove();
                },
                error: function(error) {
                    console.log(error);
                    @if (Auth::guard('secretary')->check())
                        toastr.error('The request has not been executed.');
                    @else
                        toastr.error('You do not have permission.');
                    @endif
                }
            });
        });
    </script>
@endsection
