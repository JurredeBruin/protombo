@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>prio</td>
          <td>samenvatting</td>
          <td>status</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($prio as $prios)
        <tr>
            <td>{{$prios->id}}</td>
            <td>{{$prios->prio}}</td>
            <td>{{$prios->samenvatting}}</td>
            <td>{{$prios->status}}</td>
            <td class="text-center">
                <a href="{{ route('prios.edit', $prios->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('prios.destroy', $prios->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection