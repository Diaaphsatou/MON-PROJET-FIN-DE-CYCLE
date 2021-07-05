@extends("layouts.admin")
@section("content")
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Mise a jour une misesbas</h1>
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
    <form  action="{{ route('mises_bas.update', $mises_bas->id) }}" method="POST" enctype="multipart/form-data">
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
          <label class="col-md-3">Date</label>
          <div class="col-md-6"><input type="date" name="date" value="{{$mises_bas->date}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">nombreAgneauVivant</label>
          <div class="col-md-6"><input type="number" step="0.5" name="nombreAgneauVivant" value="{{$mises_bas->nombreAgneauVivant}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">nombreAgneauMort</label>
          <div class="col-md-6"><input type="number" step="0.5" name="nombreAgneauMort" value="{{$mises_bas->nombreAgneauMort}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">ProblemeMisesBas</label>
          <div class="col-md-6"><input type="number" step="0.5" name="ProblemeMisesBas" value="{{$mises_bas->ProblemeMisesBas}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

     <div class="form-group">
        <div class="row">
          <label class="col-md-3">PeriodeMisesBas</label>
          <div class="col-md-6"><input type="text" name="periodeMisesBas" value="{{$mises_bas->periodeMisesBas}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
     
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Methode</label>
          <div class="col-md-6"><input type="text" name="methode"  value="{{$mises_bas->methode}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
     
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Commentaire</label>
          <div class="col-md-6"><input type="text" name="commentaire" value="{{$mises_bas->commentaire}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">RFIDOvin</label>
          <div class="col-md-6"><input type="number" step="0" name="ovins_RFID" value="{{$mises_bas->ovins_RFID}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Echographies_id</label>
          <div class="col-md-6"><input type="number" step="0" name="echographies_id" value="{{$mises_bas->echographies_id}}"class="form-control"></div>
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