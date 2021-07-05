@extends('layouts.admin')
@section('content')


    <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
  <div class="container" style="margin-bottom : 40px; padding-top:30px;">
      <h3>Tableau Inventaire</h3>
      <table class="table table-bordered table-striped">
        <tr>
          <th>Date début</th>
          <th>Date fin</th>
          <th>Stock initial</th>
          <th>total naissances</th>
          <th>total achats</th>
          <th>total ventes</th>
          <th>total morts</th>
          <th>Stock final</th>
          

        </tr>
    
          <tr>
          
            <td>{{ $from_date }}</td>
            <td>{{ $to_date}}</td>
            <td>{{ $avant[0]->nombre_avant }}</td>
            <td>{{ COUNT($naissances) }}</td>
            <td>{{ COUNT($achats) }}</td>
            <td>{{ COUNT($ventes) }}</td>
            <td>{{ COUNT($morts) }}</td>
            <td>{{ $final[0]->nombre_final }}</td>
            
          
          </tr>
        
      </table>
    </div>
  	<div class="container" style="margin-bottom : 40px;">
      <h4>Tableau des naissances</h4>
      <table class="table table-bordered table-striped">
        <tr>
        <th>#</th>
          <th>Sexe</th>
          <th>Date de naissance</th>
          <th>Race</th>
          <th>Nom</th>
          <th>Poids</th>
          <th>CodeEntree</th>
          <th>DateEntree</th>
        <th>CodeSortie</th>
          <th>DateSortie</th>
          <th>Prix</th>

        </tr>
        @if($naissances)
        @foreach($naissances as $key => $ovin)
          <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $ovin->sexe }}</td>
            <td>{{ $ovin->dateDeNaissance }}</td>
            <td>{{ $ovin->race }}</td>
            <td>{{ $ovin->nom }}</td>
            <td>{{ $ovin->poids }}</td>
            <td>{{ $ovin->codeEntree }}</td>
            <td>{{ $ovin->dateEntree }}</td>
            <td>{{ $ovin->codeSortie }}</td>
            <td>{{ $ovin->dateDeSortie }}</td>
            <td>{{$ovin->prix}}</td>
          
          </tr>
        @endforeach
        @else
        <tr><td colspan="11" class="text-center">Aucune naissance enregistrée pour le moment</td></tr>
        @endif
      </table>
    </div>
    <div class="container" style="margin-bottom : 40px;">
    <h4>Tableau des achats</h4>
      <table class="table table-bordered table-striped">
        <tr>
        <th>#</th>
          <th>Sexe</th>
          <th>Date de naissance</th>
          <th>Race</th>
          <th>Nom</th>
          <th>Poids</th>
          <th>CodeEntree</th>
          <th>DateEntree</th>
        <th>CodeSortie</th>
          <th>DateSortie</th>
          <th>Prix</th>

        </tr>
        @if($achats)
        @foreach($achats as $key => $ovin)
          <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $ovin->sexe }}</td>
            <td>{{ $ovin->dateDeNaissance }}</td>
            <td>{{ $ovin->race }}</td>
            <td>{{ $ovin->nom }}</td>
            <td>{{ $ovin->poids }}</td>
            <td>{{ $ovin->codeEntree }}</td>
            <td>{{ $ovin->dateEntree }}</td>
            <td>{{ $ovin->codeSortie }}</td>
            <td>{{ $ovin->dateDeSortie }}</td>
            <td>{{$ovin->prix}}</td>
          
          </tr>
        @endforeach
        @else
        <tr><td colspan="11" class="text-center">Aucun achat enregistré pour le moment</td></tr>
        @endif
      </table>
    </div>

    <div class="container" style="margin-bottom : 40px;">
    <h4>Tableau des ventes</h4>
      <table class="table table-bordered table-striped">
        <tr>
        <th>#</th>
          <th>Sexe</th>
          <th>Date de naissance</th>
          <th>Race</th>
          <th>Nom</th>
          <th>Poids</th>
          <th>CodeEntree</th>
          <th>DateEntree</th>
        <th>CodeSortie</th>
          <th>DateSortie</th>
          <th>Prix</th>

        </tr>
        @if($ventes)
        @foreach($ventes as $key => $ovin)
          <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $ovin->sexe }}</td>
            <td>{{ $ovin->dateDeNaissance }}</td>
            <td>{{ $ovin->race }}</td>
            <td>{{ $ovin->nom }}</td>
            <td>{{ $ovin->poids }}</td>
            <td>{{ $ovin->codeEntree }}</td>
            <td>{{ $ovin->dateEntree }}</td>
            <td>{{ $ovin->codeSortie }}</td>
            <td>{{ $ovin->dateDeSortie }}</td>
            <td>{{$ovin->prix}}</td>
          
          </tr>
        @endforeach
        @else
        <tr><td colspan="11" class="text-center">Aucune vente enregistrée pour le moment</td></tr>
        @endif
      </table>
    </div>

    <div class="container" style="margin-bottom : 40px;">
    <h4>Tableau des morts</h4>
      <table class="table table-bordered table-striped">
        <tr>
        <th>#</th>
          <th>Sexe</th>
          <th>Date de naissance</th>
          <th>Race</th>
          <th>Nom</th>
          <th>Poids</th>
          <th>CodeEntree</th>
          <th>DateEntree</th>
        <th>CodeSortie</th>
          <th>DateSortie</th>
          <th>Prix</th>

        </tr>
        @if($morts)
        @foreach($morts as $key => $ovin)
          <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $ovin->sexe }}</td>
            <td>{{ $ovin->dateDeNaissance }}</td>
            <td>{{ $ovin->race }}</td>
            <td>{{ $ovin->nom }}</td>
            <td>{{ $ovin->poids }}</td>
            <td>{{ $ovin->codeEntree }}</td>
            <td>{{ $ovin->dateEntree }}</td>
            <td>{{ $ovin->codeSortie }}</td>
            <td>{{ $ovin->dateDeSortie }}</td>
            <td>{{$ovin->prix}}</td>
          
          </tr>
        @endforeach
        @else
        <tr><td colspan="11" class="text-center">Aucune mort enregistrée pour le moment</td></tr>
        @endif
      </table>
    </div>
    
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