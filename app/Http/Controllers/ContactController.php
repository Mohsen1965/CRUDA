<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $data = Contact::latest()->paginate(6);
         return view('contacts.index', compact('data'))
         ->with('i', (request()->input('page', 1) - 1) * 5);
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response**/

     public function create()
     {
         return view('contacts.create');
     }


    public function store(Request $request)
    {
        $request->validate([
                'codeContact'    =>  'required',
                'nom'     =>  'sometimes|string',
                'prenom'  =>  'sometimes|string',
                'fonction'=>  'sometimes|string',
                'tel'     =>  'sometimes|string',
                'fax'     =>  'sometimes|string',
                'email'   =>  'sometimes|email',
                'observations'=>  'sometimes|string'
        ]);

        $input_data = array(
            'codeContact'       =>   $request->codeContact,
            'nom'        =>   $request->nom,
            'prenom'     => $request->prenom,
            'fonction'   =>   $request->fonction,
            'tel'        =>   $request->tel,
            'fax'        =>   $request->fax,
            'email'       =>  $request->email,
            'observations' =>  $request->observations

        );

        Contact::create($input_data);

        return redirect('contact')->with('Success', 'Contact Inserted Successfully');
    }

    public function show($codeContact)
    {
        $data = Contact::findOrFail($codeContact);
        return view('contacts.show', compact('data'));
    }


    public function edit($codeContact)
    {
        $data = Contact::findOrFail($codeContact);
        return view('contacts.edit', compact('data'));
    }


    public function update(Request $request, $codeContact)
    {
        //$image_name = $request->hidden_image;
        //$image = $request->file('image');
        //if($image != '')  // here is the if part when you dont want to update the image required
      //  {
      $request->validate([
              'codeContact'    =>  'required',
              'nom'     =>  'sometimes|string',
              'prenom'  =>  'sometimes|string',
              'fonction'=>  'sometimes|string',
              'tel'     =>  'sometimes|string',
              'fax'     =>  'sometimes|string',
              'email'   =>  'sometimes|email',
              'observations'=>  'sometimes|string'
      ]);

            $input_data = array(
            'codeContact'       =>   $request->codeContact,
            'nom'        =>   $request->nom,
            'prenom'     => $request->prenom,
            'fonction'   =>   $request->fonction,
            'tel'        =>   $request->tel,
            'fax'        =>   $request->fax,
            'email'      =>  $request->email,
            'observations'  => $request->observations,

        );

        Contact::where('codeContact',$codeContact)->update($input_data);

        return redirect('contact')->with('Success', 'Contact Updated Successfully');
    }


    public function destroy($codeContact) //  here is the part for delete employee
    {
        $data = Contact::findOrFail($codeContact);

        $data->delete();

        return redirect('contact')->with('error', 'Contact Deleted Successfully ');
    }
  }
