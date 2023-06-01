<h3>Fornecedores</h3>

@php 
    /*if() {} // enquanto if checa se for true e a única forma de inverta para false é usando operador de negação ! */ 

@endphp

{{-- usado para debugar, principalmente arrays --}}
{{-- @dd($fornecedores); --}}

@isset($fornecedores)

    {{-- loop foreach --}}
    @forelse($fornecedores as $index => $fornecedor)
        Iteração atual: {{ $loop->iteration }}
        <br>
        {{-- @dd($loop); --}}

        Fornecedor: {{ $fornecedor['nome'] }} <br>

        Status: {{ $fornecedor['status'] }} <br>

        CNPJ: {{ $fornecedor['cnpj'] ?? 'valor não preenchido'}} <br>

        Telefone: ({{ $fornecedor['ddd'] ?? ''}}) {{ $fornecedor['telefone'] ?? '' }}

        <br>
        @if($loop->first)
            Primeira iteração
        @elseif($loop->last)
            Última iteração
            <br>
            Quantidade de indices: {{ $loop->count }}
        @endif
        
        <hr>
    @empty
        Não existem registros cadastrados!
    @endforelse

    
@endisset


   



