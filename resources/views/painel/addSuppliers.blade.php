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
                <div class="card-header">Adicionar um fornecedor</div>

                <div class="card-body">
                    <form action="{{route('suppliers.store')}}" method="POST" enctype="multipart/form-data">
                    	@csrf
                    	<div class="form-group">
                          <label>Nome do fornecedor:</label>
                          <input type="text" class="form-control" name="name" placeholder="Digite o nome do produto" value="{{old('name')}}">
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>CEP:</label>
                              <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite o CEP do endereço" value="{{old('cep')}}">
                          </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                            <label>Endereço:</label>
                            <input type="text" class="form-control" div="rua" name="address" placeholder="Digite o endereço" value="{{old('address')}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Número:</label>
                        <input type="text" class="form-control"  name="number" placeholder="Digite o nº do endereço" value="{{old('number')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">

                    <div class="form-group">
                        <label>Bairro:</label>
                        <input type="text" class="form-control" div="bairro" name="neighborhood" placeholder="Digite o bairro" value="{{old('neighborhood')}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cidade:</label>
                        <input type="text" class="form-control" div="cidade" name="city" placeholder="Digite a cidade" value="{{old('city')}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Estado:</label>
                        <input type="text" class="form-control" div="uf" name="state" placeholder="Digite o estado" value="{{old('state')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label>Telefone:</label>
                      <input type="text" name="phone" id="txt_telefone" class="form-control" placeholder="Digite o número de telefone" value="{{old('phone')}}">
                  </div>
              </div>
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