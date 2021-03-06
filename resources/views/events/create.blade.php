@extends('layouts.main')

@section('title', 'HDC Eventos')

@section('content')
        <div class="col-md-6 offset-md-3">
            <h1>Crie o seu Evento</h1>
            <form action="/events" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="image">Imagem do Evento:</label>
                    <input type="file" class="form-control-file" name="image" id="image" placeholder="Nome do Evento">
                </div>
                <div class="form-group mb-3">
                    <label for="title">Evento:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Nome do Evento">
                </div>
                <div class="form-group mb-3">
                    <label for="date">Data:</label>
                    <input type="date" class="form-control" name="date" id="date" >
                </div>
                <div class="form-group mb-3">
                    <label for="city">Cidade:</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="Local do Evento">
                </div>
                <div class="form-group mb-3">
                    <label for="private">O evento é Privado</label>
                    <select name="private" id="private" class="form-control">
                        <option value="0">NÃO</option>
                        <option value="1">SIM</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="discription">Descrição:</label>
                    <textarea class="form-control" name="discription" id="discription" placeholder="Descrição"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="discription">Adicione items de infraestrutura:</label>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" id="" value="Cadeiras"> Cadeiras
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" id="" value="Palco"> Palco
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" id="" value="Cerveja Grátis"> Cerveja Grátis
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" id="" value="Open Food"> Open Food
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" id="" value="Brindes"> Brindes
                    </div>
                </div>
                 <input type="submit" class="btn btn-primary" value="Criar Evento">
            </form>
        </div>
@endsection
