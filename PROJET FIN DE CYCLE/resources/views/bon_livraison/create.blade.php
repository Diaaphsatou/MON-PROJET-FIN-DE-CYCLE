@extends('layouts.admin')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Ajouter un bon de livraison</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href=" {{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Ajouter un bon de livraison</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
    <form method="post" action="{{ route('bon_livraison.store') }}" enctype="multipart/form-data">
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
          <div class="col-md-6"><input type="number" step="0.5" name="num_bon_livraison" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Tel_Bergerie</label>
          <div class="col-md-6"><input type="number" step="0.5" name="tel_bergerie" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Adresse</label>
          <div class="col-md-6"><input type="text" name="adresse" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Num_Client</label>
          <div class="col-md-6"><input type="number" step="0.5" name="num_client" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Num_Commande</label>
          <div class="col-md-6"><input type="number" step="0.5" name="num_commande" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Date_Commande</label>
          <div class="col-md-6"><input type="date" name="date_commande"  class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Description</label>
          <div class="col-md-6"><input type="text" name="description_livraison" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
     
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Quantités_Commandées</label>
          <div class="col-md-6"><input type="number" step="0.5" name="quantite_commande" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Quantités_livrées</label>
          <div class="col-md-6"><input type="number" step="0.5" name="quantite_livrer" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Qunatités_Restant_à_livrer</label>
          <div class="col-md-6"><input type="number" step="0.5" name="quantite_restant_a_livrer" class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <label class="col-md-3">Observations</label>
          <div class="col-md-6"><input type="text" name="observations"  class="form-control"></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-info" value="Ajouter">
      </div>
     <div class="col-auto">
     <button   style="width:12% !important" onclick="myFunction()"class="btn btn-danger" >Imprimer la page </button>
       <script>
       function myFunction() {
       window.print();
       }
     </script>
    </div>

    </form>
  </div>

</section>
@endsection