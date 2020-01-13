@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
         
            <div class="card">
                <div class="card-header">Lista de fornecedores</div>

                <div class="row">
                    

                    <div class='col-md-6'>
                        <br>
                        <a href="{{route('suppliers.create')}}">
                            <button type="" class="btn btn-success add">Adicionar</button>
                        </a>

                    </div>
                    <div class="col-md-6">
                        <br>
                        <form action="{{route('searchSuppliers')}}" method="POST">
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
                                <th scope="col">CEP</th>
                                <th scope="col">Endereço</th>
                                <th scope="col">Número</th>
                                <th scope="col">Bairro</th>
                                <th scope="col">Cidade</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Editar</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($supplier as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->cep}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->number}}</td>
                                <td>{{$row->neighborhood}}</td>
                                <td>{{$row->city}}</td>
                                <td>{{$row->state}}</td>
                                <td>{{$row->phone}}</td>
                                <td>
                                    <a href="{{route('suppliers.edit', $row->id)}}">
                                        <button type="" class="btn btn-success">Editar</button>
                                    </a>
                                    
                                </td>

                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    
                    
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