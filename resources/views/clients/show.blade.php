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
<h1 class="alert alert-dark text-center "; style="color:red;font-weight:bold">Ajouter un client </h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<form method="post" action="{{ route('client.store') }}" enctype="multipart/form-data">

 @csrf

<!-- Extended default form grid -->
<div class="modal-body">
  <div class="row mt-3">
    <div class="col-md-2">
      <label for="code" style="color:blue;font-weight:bold">Code</label>
    </div>
    <div class="col-md-2">
          <input type="text" class="form-control" name="code" id="code" value="{{ $data->code }}"placeholder="Entrer le code">
    </div>
    </div>
  <div class="row mt-3">
    <div class="col-md-2">
          <label for="raisonSociale" style="color:blue;font-weight:bold">Raison Sociale</label>
    </div>
    <div class="col-md-4">
          <input type="text" class="form-control" name="raisonSociale" id="raisonSociale" value="{{ $data->raisonSociale }}"placeholder="Entrer La raison Sociale">
    </div>
    <div class="col-md-2">
      <label for="formeJuridique" style="color:blue;font-weight:bold">forme Juridique</label>
    </div>
    <div class="col-md-2">
        <select class="ui dropdown" name="formeJuridique" required="required">
          <option value="">Forme Juridique</option>
          <option value="sarl">SARL</option>
          <option value="sa">SA</option>
          <option value="indiv">Indiv</option>
          <option value="org">Organisation</option>
          <option value="autres">Autres</option>
        </select>
      </div>

  </div>

          <div class="row mt-3">
            <div class="col-md-2">
              <label for="tel" style="color:blue;font-weight:bold">Tel</label>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="tel" id="tel" value="{{ $data->tel }}"  placeholder="Entrer le telephone">
            </div>
            <div class="col-md-2">
              <label for="fax" style="color:blue;font-weight:bold">Fax</label>
            </div>
            <div class="col-md-2">
              <input type="text" class="form-control" name="fax" id="fax"  value="{{ $data->fax }}"placeholder="Entrer le fax">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-2">
              <label for="email" style="color:blue;font-weight:bold">Email</label>
            </div>
            <div class="col-md-4">
              <input type="email" class="form-control" name="email" id="email"  value="{{ $data->email }}"placeholder="Entrer email">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-2">
                  <label for="adresse" style="color:blue;font-weight:bold">Adresse</label>
            </div>
            <div class="col-md-6">
                  <input type="text" class="form-control" name="adresse" id="adresse" value="{{ $data->adresse }}"placeholder="Entrer l'adresse">
            </div>
          </div>
            <div class="row mt-3">
              <div class="col-md-2">
                <label for="ville" style="color:blue;font-weight:bold">Ville</label>
              </div>
              <div class="col-md-2">
                  <input type="text" class="form-control" name="ville" id="ville"  value="{{ $data->ville }}"placeholder="Entrer ville">
              </div>
              <div class="col-md-2">
                <label for="pays" style="color:blue;font-weight:bold">Pays</label>
              </div>
              <div class="col-md-2">
                <input type="text" class="form-control" name="pays" id="pays"  value="{{ $data->pays }}"placeholder="Entrer pays">
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-2">
                <label for="matriculeFiscal" style="color:blue;font-weight:bold">Matricule Fiscal</label>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control" name="matriculeFiscal" id="matriculeFiscal"  value="{{ $data->matriculeFiscal }}"placeholder="Entrer matricule fiscal">
            </div>
            <div class="col-md-3">
                <label for="registreCommerce" style="color:blue;font-weight:bold">Registre de Commerce </label>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control" name="registreCommerce" id="registreCommerce" value="{{ $data->registreCommerce }}" placeholder="Entrer Registre de Commerce">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-2">
                <label for="rib" style="color:blue;font-weight:bold">RIB/RIP</label>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control" name="rib" id="rib" value="{{ $data->rib }}" placeholder="Entrer RIB/RIP">
            </div>
            <div class="col-md-3">
                <label for="banque" style="color:blue;font-weight:bold">Banque </label>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control" name="banque" id="banque" value="{{ $data->banque }}" placeholder="Entrer la Banque">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-2">
                <label for="codeContact" style="color:blue;font-weight:bold">Code Contact</label>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control" name="codeContact" id="codeContact"  value="{{ $data->codeClient }}"placeholder="Entrer Code Contact">
            </div>
            <div class="col-md-3">
                <label for="contacts" style="color:blue;font-weight:bold">Contact </label>
            </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-2">
                  <label for="observations" style="color:blue;font-weight:bold">Observations</label>
              </div>
              <div class="col-md-3">
                <input type="text" class="form-control" name="observations" id="observations"  value="{{ $data->observations }}" placeholder="Entrer Observations">
              </div>

          </div>


        <div class="modal-footer col-md-6 border-top-0 d-flex justify-content-center">
          <a href="{{ route('client.index') }}" class="btn btn-danger">Annuler</a>
          <button type="submit"  name="add" class="btn btn-success">Valider</button>
        </div>
      </form>
</div>
 </div>
</form>
</div>
</div>
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
