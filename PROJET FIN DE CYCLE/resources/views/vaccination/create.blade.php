@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Enregistrer une vaccination</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href=" {{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Enregistrer une vaccination </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
    <form method="post" action="{{ route('vaccination.store') }}" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
      <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Session::has('info'))

                <div class="alert alert-success text-center">
                    <a href="id" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('info') }}</p>
                </div>
             @elseif(Session::has('error'))
                <div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('error') }}</p>
                </div>
                
            @endif
           
       
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Type</label>
          <div class="col-md-6"><input type="text" name="type" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
            <div class="row">
          <label class="col-md-3">Date de Vaccination</label>
          <div class="col-md-6"><input type="date" name="date" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div> 


      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Mode</label>
          <div class="col-md-6"><input type="text" name="mode" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">RFIDOvin</label>
          <div class="col-md-6">
            <select name="ovins_RFID" class="form-control">
              <option value="">Veuillez Selectionner </option>
              @foreach ($ovins as $key => $ovin)
              <option value="{{$ovin->rfid}}">{{ $ovin->rfid }}</option>
              @endforeach
            
            </select>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

    
      <div class="form-group">
        <input type="submit" class="btn btn-info" value="Ajouter">
      </div>
    </form>
  </div>
</section>  


@endsection