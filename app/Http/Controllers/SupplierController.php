<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSupplier;

class SupplierController extends Controller
{
    private $supplier;

    private $totalPage = 5;

    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }

 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Lista todos os produtos
        $supplier = $this->supplier->paginate($this->totalPage);
        return view('painel/suppliers', compact('supplier'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         return view('painel/addSuppliers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplier $request)
    {

     
        //Pegando os dados do form

        $dataForm = $request->except('_token');

        //Criando o cadastro

        $insert = $this->supplier->create($dataForm);

        //verifica se o cadastro foi criado e retorna uma resposta ao usuário.
        if (!empty($insert)) {
            toastr()->success('Fornecedor criando com sucesso!');
            return redirect()->back();
        } else {
            toastr()->error('Erro ao cadastrar um fornecedor');
            return redirect()->back();
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier =  Supplier::find($id);
        return view('painel/updateSupplier',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Tras dos dados do form
        $supplier = Supplier::findOrFail($id);
        $supplier->name = $request->name;
        $supplier->cep = $request->cep;
        $supplier->address = $request->address;
        $supplier->number = $request->number;
        $supplier->neighborhood = $request->neighborhood;
        $supplier->city = $request->city;
        $supplier->state = $request->state;
        $supplier->phone = $request->phone;

        //Atualiza dos dados
        $supplier->save();


        //Verifica se a atualização foi realizada
        if (!empty($supplier)) {
            toastr()->success('Fornecedor alterado com sucesso!');
            return redirect()->back();
        } else {
            toastr()->error('Erro ao alterar um fornecedor!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }

    public function searchSuppliers(Request $request){

        //Retorna 
        $supplier = Supplier::where('name', $request->name)->get();

         return view('painel/searchSuppliers', compact('supplier'));
    }
}
