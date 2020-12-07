<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
 
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys = Company::latest()->paginate(5);
  
        return view('company.index',compact('companys'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'razao' => 'required',
            'cnpj' => 'required',
            'email' => 'required',
            'endereco' => 'required',
            'telefone' => 'required',
            'email' => 'required',
        ]);
  
        Company::create($request->all());
   
        return redirect()->route('company.index')
                        ->with('sucesso','Empresa criada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companys.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companys.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'nome' => 'required',
            'razao' => 'required',
            'cnpj' => 'required',
            'email' => 'required',
            'endereco' => 'required',
            'telefone' => 'required',
            'email' => 'required',
        ]);

        $product->update($request->all());
  
        return redirect()->route('companys.index')
                        ->with('sucesso','Empresa atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
  
        return redirect()->route('companys.index')
                        ->with('successo','Empresa deletada com sucesso');
    }
}
