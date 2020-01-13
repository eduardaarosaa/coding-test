@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">Lista de produtos</div>
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <a href="{{route('products.create')}}">
                            <button type="" class="btn btn-success add">Adicionar</button>
                        </a>
                    </div>
                     <div class="col-md-6">
                        <br>
                       <form action="{{route('searchProducts')}}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-center h-100">

                            <input class="form-control" type="text" name="name" placeholder="Search...">
                            <button type="submit" class='btn btn-success'>Pesquisar</button>
                        </form>
                    </div>

                </div>    

                <div class="card-body">

                 <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Cod.Fornecedor</th>
                            <th scope="col">Imagem</th>
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->quant}}</td>
                            <td>{{$row->supplier_id}}</td>
                            <td><img src="{{url('storage/products/'.$row->image)}}" width="100px"></td>

                            <td>
                                <a href="{{route('products.edit', $row->id)}}">
                                    <button type="" class="btn btn-success">Editar</button>
                                </a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $products->links() !!}
                

            </div>
        </div>
    </div>
        <br>
        <a href="{{route('home')}}">
            <input type="button" class="btn btn-success" value="Voltar">
        </a>
    </div>
</div>


@endsection