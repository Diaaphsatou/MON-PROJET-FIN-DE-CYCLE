@extends("layouts.admin")
@section("content")
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Mise a jour des luttes</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href=" {{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Mettre a jour  </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <form  action="{{ route('lutte.update', $lutte->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
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
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
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
          <label class="col-md-3">RFIIDOvin</label>
          <div class="col-md-6"><input type="number" step="0" name="ovins_RFID" value="{{$lutte->ovins_RFID}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">NumLotLutte</label>
          <div class="col-md-6"><input type="number" step="0.5" name="numLotLutte" value="{{$lutte->numLotLutte}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">DateDebutLutte</label>
          <div class="col-md-6"><input type="date" name="dateDebutLutte" value="{{$lutte->dateDebutLutte}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">DateFinLutte</label>
          <div class="col-md-6"><input type="date" name="dateFinLutte" value="{{$lutte->dateFinLutte}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
    
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">RFIDBelier</label>
          <div class="col-md-6"><input type="number" step="0.5" name="RFIDBelier" value="{{$lutte->RFIDBelier }}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

  <div class="form-group">
        <button type="submit" class="btn btn-info">Modifier</button>
      </div>
    </form>
  </div>
</section>
@endsection