<!DOCTYPE html>
<html>
<head>
    <title>TestVariations</title>
</head>
<body>
    <h1>TestVariations</h1>

    <!-- Formulário para criar uma variação -->
    <h2>Criar Variação</h2>
    <form action="{{ route('variations.create') }}" method="post">
        @csrf
        <label for="cod">Código:</label>
        <input type="text" name="cod" required><br>
        <label for="Text1">Texto 1:</label>
        <input type="text" name="Text1" required><br>
        <label for="Price">Preço:</label>
        <input type="text" name="Price" required><br>
        <label for="Blocked">Bloqueado:</label>
        <input type="checkbox" name="Blocked" value="1"><br>
        <label for="Type">Tipo:</label>
        <input type="text" name="Type" required><br>
        <!-- Outros campos aqui... -->

        <!-- Tags associadas à variação -->
        <label for="tags">Tags:</label>
        <select name="tags[]" multiple>
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->cod }}</option>
            @endforeach
        </select><br>

        <button type="submit">Criar</button>
    </form>

    <!-- Listagem das variações -->
    <h2>Listagem de Variações</h2>
    <ul>
        @foreach ($variations as $variation)
        <li>
            <strong>Código:</strong> {{ $variation->cod }}<br>
            <strong>Texto 1:</strong> {{ $variation->Text1 }}<br>
            <strong>Preço:</strong> {{ $variation->Price }}<br>
            <!-- Outros campos aqui... -->
            <strong>Bloqueado:</strong> {{ $variation->Blocked ? 'Sim' : 'Não' }}<br>
            <strong>Tipo:</strong> {{ $variation->Type }}<br>

            <!-- Tags associadas à variação -->
            <strong>Tags:</strong>
            @foreach ($variation->tags as $tag)
                {{ $tag->cod }} @if (!$loop->last), @endif
            @endforeach
            <br>

            <a href="{{ route('variations.edit', ['id' => $variation->id]) }}">Editar</a>
            <a href="{{ route('variations.delete', ['id' => $variation->id]) }}">Excluir</a>
            <a href="{{ route('variations.block', ['id' => $variation->id]) }}">Bloquear</a>
        </li>
        @endforeach
    </ul>

    <!-- Script para excluir uma variação -->
    <script>
        function deleteVariation(id) {
            if (confirm('Tem certeza de que deseja excluir esta variação?')) {
                const url = "{{ route('variations.delete', ['id' => ':id']) }}".replace(':id', id);
                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                .then(response => {
                    if (response.status === 204) {
                        console.log('Variação excluída com sucesso!');
                        location.reload();
                    } else {
                        console.error('Erro ao excluir a variação:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Erro ao excluir a variação:', error);
                });
            }
        }
    </script>
    
                       
