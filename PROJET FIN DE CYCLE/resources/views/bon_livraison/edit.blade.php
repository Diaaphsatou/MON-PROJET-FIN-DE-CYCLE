@extends("layouts.admin")
@section("content")
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Mise a jour ovins</h1>
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
    <form  action="{{ route('bon_livraison.update', $bon_livraison->id) }}" method="POST" enctype="multipart/form-data">
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
          <label class="col-md-3">Num_Bon_Livraison</label>
          <div class="col-md-6"><input type="number" step="0.5" name="num_bon_livraison" value="{{$bon_livraison->num_bon_livraison}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Tel_Bergerie</label>
          <div class="col-md-6"><input type="number" step="0.5" name="tel_bergerie" value="{{$bon_livraison->tel_bergerie}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Adresse</label>
          <div class="col-md-6"><input type="text" name="adresse"  value="{{$bon_livraison->adresse}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Num_Client</label>
          <div class="col-md-6"><input type="number" step="0.5" name="num_client" value="{{$bon_livraison->num_client}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Num_Commande</label>
          <div class="col-md-6"><input type="number" step="0.5" name="num_commande" value="{{$bon_livraison->num_commande}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Date_Commande</label>
          <div class="col-md-6"><input type="date" name="date_commande" value="{{$bon_livraison->date_commande}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Description</label>
          <div class="col-md-6"><input type="text" name="description_livraison"  value="{{$bon_livraison->description_livraison}}" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
     
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Quantités_Commandées</label>
          <div class="col-md-6"><input type="number" step="0.5" name="quantite_commande" value="{{$bon_livraison->quantite_commande}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Quantités_livrées</label>
          <div class="col-md-6"><input type="number" step="0.5" name="quantite_livrer" value="{{$bon_livraison->quantite_livrer}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Qunatités_Restant_à_livrer</label>
          <div class="col-md-6"><input type="number" step="0.5" name="quantite_restant_a_livrer" value="{{$bon_livraison->quantite_restant_a_livrer}}"class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Observations</label>
          <div class="col-md-6"><input type="text" name="observations"  value="{{$bon_livraison->observations}}" class="form-control"></div>
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