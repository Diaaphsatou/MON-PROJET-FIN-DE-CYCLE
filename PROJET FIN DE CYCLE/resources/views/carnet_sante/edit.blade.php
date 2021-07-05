@extends("layouts.admin")
@section("content")
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Mise a jour le carnet de sante</h1>
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
    <form  action="{{ route('carnet_sante.update', $carnet_sante->id) }}" method="POST" enctype="multipart/form-data">
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
          <label class="col-md-3">Date debut traitement</label>
          <div class="col-md-6"><input type="date" name="dateDebutTraitement" value="{{$carnet_sante->dateDebutTraitement }}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Date fin traitement</label>
          <div class="col-md-6"><input type="date" name="dateFinTraitement" value="{{$carnet_sante->dateFinTraitement }}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Traitement</label>
          <div class="col-md-6"><input type="text" name="traitement"  value="{{$carnet_sante->traitement}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>


     
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Num Ordenance</label>
          <div class="col-md-6"><input type="number" step="1" name="numOrdenance" value="{{$carnet_sante->numOrdenance}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">NomProduit</label>
          <div class="col-md-6"><input type="text" name="nomProduit"  value="{{$carnet_sante->nomProduit}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Motif du traitement</label>
          <div class="col-md-6"><input type="text" name="motifDuTraitement" value="{{$carnet_sante->motifDuTraitement}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Intervenant</label>
          <div class="col-md-6"><input type="text" name="intervenant" value="{{$carnet_sante->intervenant}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Date Remise En Vente</label>
          <div class="col-md-6"><input type="date" name="dateRemiseEnVente"  value="{{$carnet_sante->dateRemiseEnVente}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
          <label class="col-md-3">RFIIDOvin</label>
          <div class="col-md-6"><input type="number" name="ovins_RFID" value="{{$carnet_sante->ovins_RFID }}" class="form-control"></div>
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