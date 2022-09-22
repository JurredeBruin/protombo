@extends('layout')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
    
</style>
<div class="card push-top">
  <div class="card-header">
    Edit & Update Prio1
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('prios.update', $prio->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="prio">Prio</label>
              <input type="text" class="form-control" name="prio" value="{{ $prio->prio }}"/>
          </div>
          <div class="form-group">
              <label for="samenvatting">samenvatting</label>
              <input type="text" class="form-control" name="samenvatting" value="{{ $prio->samenvatting }}"/>
          </div>
          <div class="form-group">
          <label for="status">Status:</label>
                <select name="status" id="status">
                  <option value="{{ $prio->status }}" selected="selected">{{ $prio->status }}</option>
                  <option value="Open">Open</option>
                  <option value="Gesloten">Gesloten</option>
                  <option value="In Behandeling">In Behandeling</option>
                </select>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update Prio</button>
      </form>
  </div>
</div>
@endsection