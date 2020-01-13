<?php

namespace App\Http\Controllers;

use App\Product;
use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    private $products;
    private $totalPage = 5;

    public function __construct(Product $products){

        $this->product = $products;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lista todos os produtos 
        $products = $this->product->paginate($this->totalPage);
        return view('painel/products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $suppliers = Supplier::all();
        return view('painel/addProducts',compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {

        $user = auth()->user();

         //Pegando os dados do form

        $dataForm = $request->except('_token');

        $dataForm['image'] = $user->image;

        //verifica se foi enviado uma imagem 
        if($request->hasfile('image') && $request->file('image')->isValid()){

            $rand =  rand();

            //cria um nome com o id e o nome do user 
            $name = $user->id.kebab_case($user->name);

            //Pega a extensão
            $extension = $request->image->extension();

            $nameFile = "{$name}.{$rand}.{$extension}";

            $upload = $request->image->storeAs('products', $nameFile);

            $dataForm['image'] = $nameFile;

            if(!$upload){
                return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer o upload');
            }

        }


        //Criando o cadastro

        $product = $this->product->create($dataForm);

        $product->suppliers()->attach($request->supplier_id);

         if (!empty($product)) {
            toastr()->success('Produto criando com sucesso!');
            return redirect()->back();
        } else {
            toastr()->error('Erro ao cadastrar um produto');
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
        $suppliers = Supplier::all();
        $product =  Product::find($id);
        return view('painel/updateProduct',compact('product','suppliers'));
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

        $user = auth()->user();
        $products = Product::findOrFail($id);
        $products->name = $request->name;
        $products->quant = $request->quant;
        $products->supplier_id = $request->supplier_id;
       
        $dataForm['image'] = $user->image;

        if($request->hasfile('image') && $request->file('image')->isValid()){

            $rand = rand();

            $name = $user->id.kebab_case($user->name);

            $extension = $request->image->extension();

            $nameFile = "{$name}.{$rand}.{$extension}";

            $upload = $request->image->storeAs('products', $nameFile);

            $dataForm['image'] = $nameFile;



            if(!$upload){
                return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer o upload');
                    }
                }
        //Verifica se foi informado a imagem
        if($dataForm['image'] == '' ){

            $dataForm['image'] = $products->image;

        }else{

        $products->image = $nameFile;
        }
         
        //Atualiza os dados
        $products->save();


        if (!empty($products)) {
            toastr()->success('Produto alterado com sucesso!');
            return redirect()->back();
        } else {
            toastr()->error('Erro ao alterar um produto!');
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
        //
    }

    public function StockMonitoring(){

    //Retorna produtos com quant menor ou igual a 3
    $select = Product::where('quant', '<=','3')->get();

    return view('painel/monitoring', compact('select'));


    }

     public function export() 
    {
        //Exportação excel com uso da lib - Excel Laravel 
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function searchProducts(Request $request){

         //Retorna a busca de um produto 
         $products = Product::where('name', $request->name)->get();

         return view('painel/searchProducts', compact('products'));
    }

}
