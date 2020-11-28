@extends('Painel.Templates.template')
@section('content')
@if(isset($title) && $title == 'Alterar Cliente.')
<form method="post" action="{{ route('client.update', $data['id']) }}">
    {!! csrf_field() !!}
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" value="{{$data['id']}}" name="id_cliente">
@else
<form method="post" action="{{ route('client.store')}}">
    {!! csrf_field() !!} 
    
@endif
    <div class="form-group">
        <label for="inputNameCli">Nome do cliente: </label>
        <input type="text" class="form-control" name="nome_cliente" placeholder="Nome completo" value="{{$data['nome_cliente'] or ''}}" required>
    </div>
    <div class="form-group">
        <label for="inputEmailCli">E-mail do cliente:</label>
        <input type="email" class="form-control" name="email_cliente" placeholder="Digite aqui o e-mail do cliente." value="{{$data['email_cliente'] or ''}}" required>
        <small id="inputEmailCli" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
    </div>
    <div class="form-group">
        <label for="inputTelCli">Telefone do cliente:</label>
        <input type="text" class="form-control phone-ddd-mask" name ="telefone_cliente" placeholder="(00) 00000-0000" id="telefone" value="{{$data['telefone_cliente'] or ''}}"required>   
    </div>
    <div class="form-group">
        <label for="inputPassword">Senha do cliente:</label>
        <input type="password" class="form-control" name="senha_cliente"placeholder="Senha" {{isset($title) && $title == 'Alterar Cliente.' ? '' : 'required' }}>
    </div>
    <div class="form-group">
        <label for="inputPassword">Data de nascimento do cliente:</label>
        <input type="date" class="form-control" name="data_nasc_cliente" value="{{$data['data_nasc_cliente'] or ''}}" required>
    </div>
    @if(isset($title) && $title == 'Alterar Cliente.')
        <button type="submit" class="btn btn-danger">Alterar</button>
        <a href="{{route('index')}}" class="btn btn-primary">Cadastrar novo cliente</a>
    @else
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    @endif
</form>
@endsection                    

