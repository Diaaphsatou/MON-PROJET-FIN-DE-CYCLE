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
        <form action=" {{ route('livraison.index') }}" method="get">
          <div class="mb-3">
            <h4>Filtre</h4>
          </div>
         
        </form>
        <br>
      
        <br>
        <form action="{{ route('bon_livraison.index') }}" method="get">
         <div class="md-3 text-right" style="margin-bottom:12px">
            <button style="width:100% !important" type="submit"class="btn btn-primary ">saisie_bon_livraison</button>
          </div>
        </form>
        <br>
  
        <form action="{{ route('livraison.showLivraison') }}" method="get">
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Date livraison</label>
            <input type="date" value="{{ old('from_date') }}" name="from_date"  class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
          </div>
         
          <div class="md-3 text-right" style="margin-bottom:12px">
            <button type="submit" class="btn btn-primary ">Génerer</button>
          </div>
         
        </form>
      

        {{--<form action="{{ route('livraison.showLivraison') }}" method="get">
         <div class="md-3 text-right" style="margin-bottom:12px">
            <button style="width:100% !important" type="submit"class="btn btn-primary ">periode_livraison</button>
          </div>
        </form> --}}
      </div>
      <div class="col-7">
        <span class="image-rond image-ronde-bg"></span>
        <img style="width:100% !important; height:100% important;" src="{{asset('dist/img/livraisons.jpg')}}" class="rounded-pill" alt="ovin">
      </div> 
       
  </div>
 </div>
</section>	


@endsection