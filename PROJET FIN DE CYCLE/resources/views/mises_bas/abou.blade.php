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
  <form action="{{ route('mises_bas.index') }}" method="get">
         <div class="md-3 text-right" style="margin-bottom:12px">
            <button style="width:100% !important" type="submit"class="btn btn-primary "><h1>Saisie Mises_Bas</h1></button>
          </div>
    </form>
    <div class="row">
      <div class="col-5 vertical-align-center">
        <form action="{{ route('mises_bas.abou') }}" method="get">
          <div class="mb-3">
            <h4>Filtre</h4>
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Date Debut Agnelage</label>
            <input type="date" value="{{ old('from_date') }}" name="from_date"  class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Date Fin Agnelage</label>
            <input type="date" value=" {{old('to_date')}} " name="to_date" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
          </div>

          <div class="md-3 text-right" style="margin-bottom:12px">
            <button type="submit" class="btn btn-primary ">Génerer</button>
          </div>
         
        </form>
        <form action="{{ route('mises_bas.selection') }}" method="get">
        <div class="md-3">
            <button style="width:100% !important" type="submit"class="btn btn-danger ">Autres selection</button>
         </div>
        </form>
        
      </div>
      <div class="col-7">
        <img style="width:100% !important; height:100% important;" src="{{asset('dist/img/mises.jpg')}}" class="rounded mx-auto d-block" alt="misesbas">
      </div>
      


    </div>


  	
  </div>
</section>	


@endsection