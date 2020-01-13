@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 12rem;">
                                <div class="card-body" align="center">
                                    <span>
                                        <a href="{{url('admin/products')}}"><i class="fas fa-box"></i>
                                    </span>
                                    <h5 class="card-title">Produtos</h5></a>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="card" style="width: 12rem;">
                                <div class="card-body" align="center">
                                    <span>
                                        <a href="{{url('admin/suppliers')}}"><i class="fas fa-truck"></i>
                                    </span>
                                    <h5 class="card-title">Fornecedores</h5></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card" style="width: 12rem;">
                                <div class="card-body" align="center">
                                    <span>
                                        <a href="{{url('admin/monitoring')}}"><i class="fas fa-tv"></i>
                                    </span>

                                    <h5 class="card-title">Monitoramento Estoque</h5></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
