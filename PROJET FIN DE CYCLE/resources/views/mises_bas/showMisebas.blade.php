@extends('layouts.admin')
@section('content')

    <!-- /.content-header -->
<section class="content">

  	<table class="table table-bordered table-striped">
  		<tr>
  			<th>Id</th>
            <th>TxProliferation</th>
            <th>TxMortalite</th>
            <th>NbreMisesbas</th>
            <th>NbreAgneau</th>
            <th>NbreProbMisesBas</th>
            <th>PeriodeMisesBas</th>
            <th>date</th>
            <th>methode</th>
            <th>derniereMisesBas</th>
            <th>Commentaire</th>
            <th>ovins_RFID</th>
            <th>echographies_id</th>
  			<th>Action</th>
  		</tr>
        @if($naissances)
        @foreach($naissances as $key => $mises_bas)
  		<tr>
  		    <td>{{ $key+1 }}</td>
  		    <td>{{ $mises_bas->tauxProliferation }}</td>
          <td>{{ $mises_bas->tauxMortalite }}</td>
          <td>{{ $mises_bas->nombreMisesBas }}</td>
          <td>{{ $mises_bas->nombreAgneau }}</td>
          <td>{{ $mises_bas->nombreProblemeMisesBas }}</td>
          <td>{{ $mises_bas->periodeMisesBas }}</td>
          <td>{{ $mises_bas->date }}</td>
          <td>{{ $mises_bas->methode }}</td>
          <td>{{ $mises_bas->derniereMisesBas }}</td>
          <td>{{ $mises_bas->commentaire }}</td>
          <td>{{ $mises_bas->ovins_RFID}}</td>
          <td>{{ $mises_bas->echographies_id}}</td>
        
  		</tr>
  		@endforeach
      @else
      <tr><td colspan="12">Aucun enregistrement effectue pour le moment</td></tr>
      @endif
  	</table>
    
  </div>
</section>	


@endsection