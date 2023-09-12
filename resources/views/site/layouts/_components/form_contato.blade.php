{{ $slot }}

<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivos_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->motivo_contato ? 'selected' : '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class="{{ $classe }}" >{{ (old('mensagem') != "") ? old('mensagem') : "Digite sua mensagem" }} </textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

@if(count($errors) > 0)
<div style="position: absolute; width: 100%; top: 0; left: 0; background: red;">
    <pre>
       <p> {{ print_r($errors) }} </p>
    </pre>
</div>
@endif