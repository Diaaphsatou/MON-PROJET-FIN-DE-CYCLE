@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href=" {{ route('admin.home') }}">Dashboard</a></li>
         
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-5 vertical-align-center">
        <form action="{{ route('ovins.inventaire') }}" method="get">
          <div class="mb-3">
            <h4>Filtre</h4>
          </div>
        
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Date de début</label>
            <input type="date" value="{{ old('from_date') }}" name="from_date"  class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Date de la fin</label>
            <input type="date" value=" {{old('to_date')}} " name="to_date" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
          </div>

          <div class="md-3 text-right" style="margin-bottom:12px">
            <button type="submit" class="btn btn-primary ">Génerer</button>
          </div>
         
        </form>
      </div>
      <div class="col-7">
        <img style="width:100% !important; height:100% important;" src="{{asset('dist/img/ovins.jpg')}}" class="rounded mx-auto d-block" alt="ovin">
      </div>
      


    </div>


  	
  </div>
</section>	


@endsection