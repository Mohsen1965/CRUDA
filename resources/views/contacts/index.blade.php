@extends('layouts.master')
@section('content')

<style>
        .container{
            padding:0.5%;
        }
    </style>
<div class="container">
<h2 class="alert alert-dark text-center " style="color:red; text:bold"> Gestion Commerciale</h2>

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
 <a href="{{ route('contact.create') }}" class="btn btn-success">
 <span style="color:black" class="fa fa-plus-circle"> Ajouter un nouveau Contact </span></a>
</div>
<table class="table table-bordered table-striped bg-dark" style="color:white; border:none">
 <tr class="text-center">
  <th >codeContact</th>
  <th >Nom</th>
  <th >Prenom</th>
  <th >Fonction</th>
  <th >Tel</th>
  <th >Fax</th>
  <th >Email</th>
  <th >Observations</th>
  <th >Action</th>
 </tr>
 @foreach($data as $contact)
 <tbody style="color:black; font:blod; background:#ffff">
  <tr class="text-center">
   <!-- <td><img src="{{ URL::to('/') }}/images/{{ $contact->image }}" class="rounded-circle" width="60" height="50" /></td> -->
   <td>{{ $contact->codeContact }}</td>
   <td>{{ $contact->nom}}</td>
   <td>{{ $contact->prenom }}</td>
   <td>{{ $contact->fonction }}</td>
   <td>{{ $contact->tel }}</td>
   <td>{{ $contact->fax }}</td>
   <td>{{ $contact->email }}</td>
   <td>{{ $contact->observations }}</td>
   <td width="25%">
   <!-- here is the button action side where you can edit . view and delete the employee record -->
   <form action="{{ route('contact.destroy', $contact->codeContact) }}" method="post">
	<a href="{{ route('contact.show',$contact->codeContact)}}" class="btn btn-sm btn-warning">
    <span class="fa fa-eye">Show</span> </a>

  <a href="{{ route('contact.edit', $contact->codeContact) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Edit</a>
	@csrf
	@method('DELETE')
	<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" href="{{route('contact.destroy', $contact->codeContact)}}"><span class="fa fa-trash"></span> Delete</button>
	</form>
                <!-- ends here -->
   </td>
  </tr>
  </tbody>
 @endforeach
</table>
{!! $data->links() !!}
@endsection
