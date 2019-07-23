@extends('layouts.layout')

@section('title','Patients List')

@section('content')


<div class="container" align="center">
<div><h2>Pateints List</h2></div></br>

<table class="table">
  <thead>
    <tr>
        <th scope="col">Patient Name</th>
        <th scope="col">Date of Birth</th>
        <th scope="col">Division Name</th>
        <th scope="col">Last treatment date</th>
        <th scope="col">Last treatment name</th>
    </tr>
  </thead>
  <tbody>
  @foreach($patients as $patient)
    <tr>
        <th>{{ $patient->first_name }} {{ $patient->last_name }}</th>
        <th>{{ $patient->dob }}</th>
        <th>{{ $patient->division_name }}</th>
        <th>{{ $patient->treatment_date }}</th>
        <th>{{ $patient->treatment_name }}</th>
    </tr>

  @endforeach



  </tbody> 
</table>
</div>



@endsection