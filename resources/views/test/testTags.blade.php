<!DOCTYPE html>
<html>
<head>
    <title>Teste de Tags</title>
</head>
<body>
    <h1>Teste de Tags</h1>

    <!-- Formulário para criar uma nova tag -->
    <form action="{{ route('tags.create') }}" method="POST">
        @csrf
        <label for="cod">Código:</label>
        <input type="text" name="cod" required>
        <br>
        <label for="type">Tipo:</label>
        <input type="text" name="type" required>
        <br>
        <button type="submit">Criar Tag</button>
    </form>

    <!-- Listagem das tags existentes -->
    <h2>Tags existentes:</h2>
    <ul>
        @foreach($tags as $tag)
            <li>
                Código: {{ $tag->cod }}, Tipo: {{ $tag->type }}
                <br>
                <a href="{{ route('tags.edit', ['id' => $tag->id]) }}">Editar</a>
                <a href="{{ route('tags.block', ['id' => $tag->id]) }}">Bloquear</a>
                <a href="#" onclick="deleteTag({{ $tag->id }})">Excluir</a>
            </li>
        @endforeach
    </ul>

    <!-- Script para excluir uma tag -->
    <script>
        function deleteTag(id) {
            if (confirm('Tem certeza de que deseja excluir esta tag?')) {
                const url = "{{ route('tags.delete', ['id' => ':id']) }}".replace(':id', id);
                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                .then(response => {
                    if (response.status === 204) {
                        console.log('Tag excluída com sucesso!');
                        location.reload();
                    } else {
                        console.error('Erro ao excluir a tag:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Erro ao excluir a tag:', error);
                });
            }
        }
    </script>
</body>
</html>
