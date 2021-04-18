@extends('layouts.master')
@section('content')

<style>
        .container{
            padding:0.5%;
        }
    </style>
<div class="container">
<h2 class="alert alert-dark text-center " style="color:red; text:bold"><span class="fab fa-laravel"> LARAVEL 6.0 ADVANCE CRUD APPLICATION WITH IMAGE UPLOAD</span></h2>

@if($message = Session::get('Success'))
<div class="alert alert-success">
<p align="center">{{$message}}</p>
</div>
@endif

@if($message = Session::get('error'))
<div class="alert alert-danger">
<p align="center">{{$message}}</p>
</div>
@endif

</div>
<div align="right">
 <a href="{{ route('client.create') }}" class="btn btn-default">
 <span class="fa fa-plus-circle"> Add New client</span></a>
</div>
<table class="table table-bordered table-striped bg-dark" style="color:white; border:none">
 <tr class="text-center">
  <th >Code </th>
  <th >Raison Sociale</th>
  <th >Forme Juridique</th>
  <th >Tel</th>
  <th >Fax</th>
  <th >Email</th>
  <th >Adresse</th>
  <th >Ville</th>
  <th >Pays</th>
  <th >Matricule Fiscal</th>
  <th >Registre de Commerce </th>
  <th >RIB/RIP</th>
  <th >Banque</th>
 </tr>
 @foreach($data as $client)
 <tbody style="color:black; font:blod; background:#ffff">
  <tr class="text-center">
   <td>{{ $client->code }}</td>
   <td>{{ $client->raisonSociale }}</td>
   <td>{{ $client->formeJuridique }}</td>
   <td>{{ $client->tel }}</td>
   <td>{{ $client->fax }}</td>
   <td>{{ $client->email }}</td>
   <td>{{ $client->adresse }}</td>
   <td>{{ $client->ville }}</td>
   <td>{{ $client->pays }}</td>
   <td>{{ $client->matriculeFiscal }}</td>
   <td>{{ $client->registreCommerce }}</td>
   <td>{{ $client->rib }}</td>
   <td>{{ $client->banque }}</td>
   <td>{{ $client->codeContact }}</td>
   <td>{{ $client->observations }}</td>

   <td width="25%">
   <!-- here is the button action side where you can edit . view and delete the client record -->
   <form action="{{ route('client.destroy', $client->code) }}" method="post">
	<a href="{{ route('client.show', $client->code) }}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span> Show</a>
	<a href="{{ route('client.edit', $client->code) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Edit</a>
	@csrf
	@method('DELETE')
	<button type="submit" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> Delete</button>
	</form>
                <!-- ends here -->
   </td>
  </tr>
  </tbody>
 @endforeach
</table>
{!! $data->links() !!}
@endsection
