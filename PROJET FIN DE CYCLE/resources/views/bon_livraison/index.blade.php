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

<div>
        <div class="mx-auto pull-right">
            <div class="">
                <form action="{{ route('bon_livraison.index') }}" method="GET" role="search">
                 <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search ovins">
                                <span class="fa fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="rechercher" id="term">
                        <a href="{{ route('bon_livraison.index') }}" class=" mt-1">
                            <span class="input-group-btn  mr-5 mt-1">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                   <span class="fa fa-refresh"></span>
                                  
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
  	<p>
  		<a href="{{ route('bon_livraison.create') }}" class="btn btn-primary">Ajouter un bon de livraison</a>
  	</p>
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

  	<table class="table table-bordered table-striped">
  		<tr>
  		<th>id</th>
        <th>Num_Bon_Livraison</th>
        <th>Tel_Bergerie</th>
        <th>Adresse</th>
        <th>Num_Client</th>
        <th>Num_Commande</th>
        <th>Date_Commande</th>
        <th>Description</th>
  		<th>Quantités_Commandées</th>
        <th>Quantités_livrées</th>
        <th>Qunatités_Restant_à_livrer</th>
        <th>Observations</th>
  		<th>Action</th>
  		</tr>
      @if(count($bon_livraison))
  		@foreach($bon_livraison as $key => $bon_livraison)
  			<tr>
  		 <td>{{ $key+1 }}</td>
  		  <td>{{ $bon_livraison->num_bon_livraison }}</td>
          <td>{{ $bon_livraison->tel_bergerie }}</td>
          <td>{{ $bon_livraison->adresse }}</td>
          <td>{{ $bon_livraison->num_client }}</td>
          <td>{{ $bon_livraison->num_commande }}</td>
          <td>{{ $bon_livraison->date_commande }}</td>
          <td>{{ $bon_livraison->description_livraison }}</td>
          <td>{{ $bon_livraison->quantite_commande }}</td>
          <td>{{ $bon_livraison->quantite_livrer }}</td>
          <td>{{ $bon_livraison->quantite_restant_a_livrer }}</td>
          <td>{{ $bon_livraison->observations }}</td>
  		  <td>
            <a href="{{ route('bon_livraison.edit',$bon_livraison->id) }}" class="btn btn-info"> <i class="fa fa-edit"> Modifier</i></a> 
            <a href="{{ route('bon_livraison.destroy',$bon_livraison->id) }}" class="btn btn-danger"><i class="fa fa-trash"> Supprimer </i></a> 
          </td>
  			</tr>
  		@endforeach
      @else
      <tr><td colspan="12">Aucun enregistrement effectue pour le moment</td></tr>
      @endif
  	</table>
  {{--  {{ $ovins->render() }} --}}
  <div class="col-auto">
    <button   style="width:12% !important" onclick="myFunction()"class="btn btn-danger" >Imprimer la page</button>
       <script>
       function myFunction() {
       window.print();
       }
     </script>
  </div>
  </div>
 

</section>	
 

@endsection