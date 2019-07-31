@extends('layouts.layout')

@section('title','Patients List')

@section('content')


<div class="container" align="center">
<div><h2>Pateints List</h2></div></br>
<form class="form-inline my-2 my-lg-0" action="/search" method="get">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" required="">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
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
        <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
        <td>{{ date('F d, Y', strtotime($patient->dob)) }}</td>
        <td>{{ $patient->division->name }}</td>
        <td>  {{ date('F d, Y', strtotime($patient->treatments->first()->created_at)) }}</td>
        <td> {{ $patient->treatments->first()->name }} </td> 
        <td></td>
    </tr>

  @endforeach



  </tbody> 
</table>
</div>
<div class="pagination justify-content-center">
  {{$patients->links()}}
</div>



@endsection