<!DOCTYPE html>
<html>
<head>
    <title>TestCategory</title>
</head>
<body>
    <h1>TestCategory</h1>

    <!-- Formulário para criação de categoria -->
    <h2>Criar Categoria</h2>
    <form action="{{ route('categories.create') }}" method="post">
        @csrf
        <label for="name">IMG:</label>
        <input type="file" name="image" accept="image/*">
        <label for="name">Nome:</label>
        <input type="text" name="cod" required>
        <button type="submit">Criar</button>
    </form>

    <!-- Listagem das categorias -->
    <h2>Listagem de Categorias</h2>
    <ul>
        @foreach ($categories as $category)
        <li>{{ $category->name }} - <a href="{{ route('categories.delete', ['id' => $category->id]) }}">Excluir</a></li>
        @endforeach
    </ul>

    <!-- Script para bloquear/desbloquear uma categoria -->
    <script>
        function toggleBlock(id) {
            const url = "{{ route('categories.block', ['id' => ':id']) }}".replace(':id', id);
            fetch(url, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(category => {
                console.log('Categoria bloqueada/desbloqueada:', category);
            })
            .catch(error => {
                console.error('Erro ao bloquear/desbloquear categoria:', error);
            });
        }
    </script>
</body>
</html>
