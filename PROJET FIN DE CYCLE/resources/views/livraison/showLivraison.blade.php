@extends('layouts.admin')
@section('content')
   <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
  	
  	<table class="table table-bordered table-striped">
  		<tr>
  		  <th>Id</th>
  		  <th>Date livraison</th>
          <th>Destination</th>
          <th>Transport</th>
          <th>RFIIDOvin</th>
  		  <th>Action</th>
  		</tr>
          @if($avant)
        @foreach($avant as $key => $livraison)
        <tr>
  				<td>{{ $key+1 }}</td>
  				<td>{{ $livraison->date }}</td>
          <td>{{ $livraison->destination }}</td>
          <td>{{ $livraison->transport }}</td>
          <td>{{ $livraison->ovins_RFID }}</td>

  			</tr>
  		@endforeach
      @else
      <tr><td colspan="6">Aucun enregistrement effectue pour le moment</td></tr>
      @endif
  	</table>
  			
      
      
  	</table>
  
  </div>
</section>	


@endsection