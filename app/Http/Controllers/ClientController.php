<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Client::latest()->paginate(6);
      //  dd($data);
    //    $data1 = Client::with('contact')->get();
        //dd($data1);

        return view('clients.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
                'code'    =>  'required',
                'raisonSociale'     =>  'required',
                'formeJuridique'     =>  'required',
                'tel'     =>  'required',
                'fax'     =>  'required',
                'email'    =>  'required',
                'adresse'     =>  'required',
                'ville'     =>  'required',
                'pays'     =>  'required',
                'matriculeFiscal'     =>  'required',
                'registreCommerce'    =>  'required',
                'rib'     =>  'required',
                'banque'     =>  'required',
                'codeContact'=>'required',
                'observations'=>'required'

        ]);


        $input_data = array(
            'code'       =>   $request->code,
            'raisonSociale'        =>   $request->raisonSociale,
            'formeJuridique'        =>      $request->formeJuridique,
            'tel'        =>       $request->tel,
            'fax'        =>       $request->fax,
            'email'            => $request->email,
            'adresse'            => $request->adresse,
            'ville'            => $request->ville,
            'pays'            => $request->pays,
            'matriculeFiscal'  => $request->matriculeFiscal,
            'registreCommerce'  => $request->registreCommerce,
            'rib'            => $request->rib,
            'banque'            => $request->banque,
            'codeContact'           => $request->codeContact,
            'observations'         => $request->observations,


        );

        Client::create($input_data);

        return redirect('client')->with('Success', 'Client Inserted Successfully');
    }

    public function show($code)
    {
      $data = Client::findOrFail($code);
        return view('clients.show', compact('data'));
    }


    public function edit($code)
    {
        $data = Client::findOrFail($code);
        return view('clients.edit', compact('data'));
    }


    public function update(Request $request, $code)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')  // here is the if part when you dont want to update the image required
        {
            $request->validate([
                'first_name'    =>  'required',
                'last_name'     =>  'required',
                'gender'     =>  'required',
                'email'     =>  'required',
                'phone'     =>  'required',
                'image'         =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else  // this is the else part when you dont want to update the image not required
        {
            $request->validate([
                'first_name'    =>  'required',
                'last_name'     =>  'required',
                'gender'     =>  'required',
                'email'     =>  'required',
                'phone'     =>  'required',
            ]);
        }

        $input_data = array(
            'first_name'       =>   $request->first_name,
            'last_name'        =>   $request->last_name,
            'gender'        =>      $request->gender,
            'email'        =>       $request->email,
            'phone'        =>       $request->phone,
            'image'            =>   $image_name
        );

        Client::whereId($code)->update($input_data);

        return redirect('client')->with('Success', 'Client Updated Successfully');
    }


    public function destroy($code) //  here is the part for delete Client
    {
        $data = Client::findOrFail($code);
        $data->delete();

        return redirect('client')->with('error', 'Client Deleted Successfully ');
    }
}
