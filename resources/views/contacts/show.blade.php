@extends('layouts.master')
@extends('layouts.style')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
<style>
        .container{
            padding:0.5%;
        }
    </style>
<div class="container">
<h1 class="alert alert-dark text-center "; style="color:red;font-weight:bold">show Contact #{{$data->codeContact}}</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"></div>

<form method="post" action="{{ route('contact.update', $data->codeContact) }}" enctype="multipart/form-data">

 @csrf
@method('PUT')
<!-- Extended default form grid -->
<div class="modal-body">
  <div class="row mt-3">
    <div class="col-md-2">
      <label for="codeContact" style="color:blue;font-weight:bold">codeContact</label>
    </div>
    <div class="col-md-3">
          <input type="text" class="form-control" name="codeContact" id="codeContact" value="{{ $data->codeContact }}"placeholder="Entrer le codeContact">
    </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-2">
          <label for="nom" style="color:blue;font-weight:bold">Nom</label>
        </div>
    <div class="col-md-4">
          <input type="text" class="form-control" name="nom" id="nom" value="{{ $data->nom }}" placeholder="Entrer Nom">
    </div>
    <div class="col-md-2">
      <label for="prenom" style="color:blue;font-weight:bold">Prenom</label>
    </div>
    <div class="col-md-4">
          <input type="text" class="form-control" name="prenom" id="prenom" value="{{ $data->prenom }}"placeholder="Entrer Prenom">
    </div>
  </div>
    <div class="row mt-3">
      <div class="col-md-2">
        <label for="fonction" style="color:blue;font-weight:bold">Fonction</label>
      </div>
      <div class="col-md-2">
        <select class="ui dropdown" name="fonction" value="{{ $data->fonction }}"required="required">
          <option value="">Fonction</option>
          <option value="directeur">Directeur</option>
          <option value="chefService">Chef Service</option>
          <option value="financier">Financier</option>
          <option value="commercial">Commercial</option>
          <option value="econome">Econome</option>
          <option value="administratif">Administratif</option>
          <option value="ordonnancier">Ordonnancier</option>
          <option value="autres">Autres</option>
        </select>
      </div>

  </div>

          <div class="row mt-3">
            <div class="col-md-2">
              <label for="tel" style="color:blue;font-weight:bold">Tel</label>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="tel" id="tel" value="{{ $data->tel }}" placeholder="Entrer le telephone">
            </div>
            <div class="col-md-2">
              <label for="fax" style="color:blue;font-weight:bold">Fax</label>
            </div>
            <div class="col-md-2">
              <input type="text" class="form-control" name="fax" id="fax" value="{{ $data->fax }}" placeholder="Entrer le fax">
            </div>
        </div>
          <div class="row mt-3">
            <div class="col-md-2">
              <label for="email" style="color:blue;font-weight:bold">Email</label>
            </div>
            <div class="col-md-4">
              <input type="email" class="form-control" name="email" id="email" value="{{ $data->email }}" placeholder="Entrer email">
            </div>
          </div>
        <div class="row mt-3">
            <div class="col-md-2">
              <label for="observations"style="color:blue;font-weight:bold">Observations</label>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" name="observations" id="observations"  value="{{ $data->observations }}" placeholder="Entrer observations">
            </div>
        </div>
        <div class="modal-footer col-md-6 border-top-0 d-flex justify-content-center">
          <a href="{{ route('contact.index') }}" class="btn btn-danger">Annuler</a>
          <button type="submit"  name="add" class="btn btn-success">Valider</button>
        </div>


</div>
</form>

</div>

@endsection

@section('scripts')

<script>
 //---------------------Browse image----------------
 $('#browse_file').on('click',function(){
                            $('#image').click();
                        })
                        $('#image').on('change', function(e){
                            showFile(this, '#showImage');
                        })

</script>

@endsection
