@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         @if(isset($errors) && count($errors)> 0)
         <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
        <div class="card">
            <div class="card-header">Adicionar um produto ao estoque</div>

            <div class="card-body">
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <div class="form-group">
                      <label>Nome do produto:</label>
                      <input type="text" class="form-control" name="name" placeholder="Digite o nome do produto" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                      <label>Quantidade do produto:</label>
                      <input type="text" class="form-control" name="quant" placeholder="Digite a quantidade do produto" value="{{old('quant')}}">
                  </div>

                  <select name="supplier_id" class="form-control form-control-lg">
                   @foreach($suppliers as $row)
                   <option value="{{$row->id}}">{{$row->name}}</option>
                   @endforeach
               </select>
               <div class="form-group">
                  <label>Adicione uma image ao produto:</label>
                  <input type="file" value="{{old('image')}}" name="image" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary">Cadastrar</button>
              
          </form>

      </div>
  </div>
          <br>
        <a href="{{route('home')}}">
            <input type="button" class="btn btn-success" value="Voltar">
        </a>
</div>
</div>
</div>


@endsection