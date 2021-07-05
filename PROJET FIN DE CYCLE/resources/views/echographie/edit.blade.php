@extends("layouts.admin")
@section("content")
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Mise a jour un echographie</h1>
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
    <form  action="{{ route('echographie.update', $echographie->id) }}" method="POST" enctype="multipart/form-data">
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
                    <a href="id" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('info') }}</p>
                </div>
             @elseif(Session::has('error'))
                <div class="alert alert-danger text-center">
                    <a href="id" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('error') }}</p>
                </div>
                
            @endif
       
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Lot</label>
          <div class="col-md-6">
            <select name="lot" class="form-control">
              <option value="">Veuillez Selectionner un lot</option>
              <option value="Vide" @if($echographie->lot == 'Vide') selected @endif>Vide</option>
              <option value="Plein" @if($echographie->lot == 'Plein') selected @endif>Plein</option>
            
            </select>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Nombre Foetus</label>
          <div class="col-md-6"><input type="number" name="nbreFoetus" value="{{$echographie->nbreFoetus}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Date Echographie</label>
          <div class="col-md-6"><input type="date" name="dateEcho" value="{{$echographie->dateEcho}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">RFIDOvin</label>
          <div class="col-md-6"><input type="number" step="0.5" name="ovins_RFID" value="{{$echographie->ovins_RFID}}"class="form-control"></div>
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