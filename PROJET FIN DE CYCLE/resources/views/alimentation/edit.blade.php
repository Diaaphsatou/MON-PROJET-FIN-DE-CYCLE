@extends("layouts.admin")
@section("content")
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Mise a jour une ration alimentataire</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href=" {{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Mettre a jour </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <form  action="{{ route('alimentation.update', $alimentation->id) }}" method="POST" enctype="multipart/form-data">
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
          <label class="col-md-3">Categories_0vins</label>
          <div class="col-md-6"><input type="text" name="categories_ovins"  value="{{$alimentation->categories_ovins}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">TypeAliments</label>
          <div class="col-md-6"><input type="text" name="typeAliments"  value="{{$alimentation->typeAliments}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Quantites</label>
          <div class="col-md-6"><input type="number" step="0.5" name="quantites" value="{{$alimentation->quantites}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Periodes</label>
          <div class="col-md-6"><input type="text" name="periodes"  value="{{$alimentation->periodes}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>


      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Methode</label>
          <div class="col-md-6"><input type="text" name="methode" value="{{$alimentation->methode}}" class="form-control"></div>
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