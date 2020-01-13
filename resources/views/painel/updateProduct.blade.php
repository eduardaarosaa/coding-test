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
      <div class="card-header">Atualizando um produto</div>
      <div class="card-body">
        <form action="{{route('updateProduct', $product->id)}}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="form-group">
          <label>Nome do produto:</label>
          <input type="text" class="form-control" name="name" placeholder="Digite o nome do produto" value="{{$product->name}}">
        </div>
        <div class="form-group">
          <label>Quantidade do produto:</label>
          <input type="text" class="form-control" name="quant" placeholder="Digite a quantidade do produto" value="{{$product->quant}}">
        </div>
           
        <select name="supplier_id" class="form-control form-control-lg">
          @foreach($suppliers as $supplier)
         <option value="{{$supplier->id}}" {{$product->supplier_id == $supplier->id ? "selected" : ""}}>{{$supplier->name}}</option>
         @endforeach
       </select>
       <br>
       <div class="form-group">
        <img src="{{url('storage/products/'.$product->image)}}" width="100px">
      </div>
      <div class="form-group">
        <label>Adicione uma image ao produto:</label>
        <input type="file" name="image" class="form-control">
      </div>


      <button type="submit" class="btn btn-primary">Atualizar</button>

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