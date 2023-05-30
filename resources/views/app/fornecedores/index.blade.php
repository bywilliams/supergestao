<h3>Fornecedores</h3>

@php 
    /*if() {} // enquanto if checa se for true e a única forma de inverta para false é usando operador de negação ! */ 

@endphp

{{-- usado para debugar, principalmente arrays --}}
{{-- @dd($fornecedores); --}}

@isset($fornecedores)

    {{-- loop foreach --}}
    @foreach($fornecedores as $index => $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'valor não preenchido'}}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? ''}}) {{ $fornecedor['telefone'] ?? '' }}
        <hr>
    @endforeach

    {{-- loop while --}}
    {{-- @php $i = 0; @endphp
    @while(isset($fornecedores[$i]))
        Fornecedor: {{ $fornecedores[$i]['nome'] }}
        <br>
        Status: {{ $fornecedores[$i]['status'] }}
        <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'valor não preenchido'}}
        <br>
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? ''}}) {{ $fornecedores[$i]['telefone'] ?? '' }}
        <hr>
        @php $i++ @endphp
    @endwhile --}}

    {{-- loop for --}}
    {{-- @for($i = 0; isset($fornecedores[$i]); $i++)
        Fornecedor: {{ $fornecedores[$i]['nome'] }}
        <br>
        Status: {{ $fornecedores[$i]['status'] }}
        <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'valor não preenchido'}}
        <br>
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? ''}}) {{ $fornecedores[$i]['telefone'] ?? '' }}
        <hr>
    @endfor --}}



@endisset


   



