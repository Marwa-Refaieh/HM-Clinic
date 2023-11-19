@extends('demo.demo-layouts.master')

@section('title')
    Doctors
@stop

@section('css')
    <!-- Link Animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="{{ URL::asset('demo/css/doctors.css') }}" rel="stylesheet">
@stop

@section('content')
    <section>
        <table class="table " id="table" data-toggle="table" data-search="true" data-pagination="true"
        data-toolbar="#toolbar">
        <thead class=" text-primary">
          <th data-sortable="true">ID</th>
          <th>Photo</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Gender</th>
          <th>Age</th>
          <th>Specialize</th>
          <th>Phone</th>
          <th>Price</th>
          <th>Days</th>
          <th>Email</th>
          <th>Password</th>
          <th>Control</th>
          <th>Delete</th>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td><img src="https://picsum.photos/40" class="rounded-circle" alt="Cinque Terre"> </td>
            <td>Marwa </td>
            <td>Refaieh</td>
            <td>Famel</td>
            <td>2001/4/1</td>
            <td>Dermatologists</td>
            <td>0950509164</td>
            <td>20000</td>
            <td>mon/tus/sun</td>
            <td>marwarefaieh@gmail.com</td>
            <td>123456789</td>
            <td class="icon"><a class="fa fa-pencil-square-o text-warning " data-toggle="modal"
                data-target="#exampleModal-update" aria-hidden="true"></a></td>
            <td class="icon"><a href="https://www.youtube.com/" class=" fa fa-trash-o text-danger"
                data-toggle="modal" data-target="#exampleModal-delete" aria-hidden="true"></a></td>
          </tr>
        </tbody>
      </table>
    </section>

@stop

@section('script')
    {{-- <script src="{{ URL::asset('demo/js/jquery.tabpager.js') }}"></script>/ --}}
    <script src="{{ URL::asset('demo/js/doctors.js') }}"></script>
    {{-- <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script> --}}
@stop
