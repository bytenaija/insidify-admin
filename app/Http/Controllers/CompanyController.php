<?php

namespace App\Http\Controllers;
use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);

        return view('company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $path = Storage::putFileAs('', $request->file('logo'), uniqid('logo_'));

        $company = new Company($request->all());

        $company->logo = $path;

        $company->save();

        return redirect(route('company.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $company = Company::with('employees')->where('id', $id)->first();

       return view('company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('id', $id)->first();
        return view('company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {

        echo $request;
        $company = Company::where('id', $id)->first();
        if($company->logo != ''){
            Storage::delete($company->logo);
        }
        var_dump($request->all());
        $path = Storage::putFileAs('', $request->file('logo'), uniqid('logo_'));

       $data = $request->all();
       $data['logo'] = $path;

       $company->update($data);

        return redirect(route('company.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::where('id', $id)->first();
        $company->delete();

        return redirect(route('company.index'));
    }
}
