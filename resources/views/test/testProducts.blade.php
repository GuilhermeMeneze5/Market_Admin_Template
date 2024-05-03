<!DOCTYPE html>
<html>
<head>
    <title>TestProducts</title>
</head>
<body>
    <h1>TestProducts</h1>

    <!-- Formulário para criar um produto -->
    <h2>Criar Produto</h2>
    <form action="{{ route('products.create') }}" method="post">
        @csrf
        <label for="cod">Código:</label>
        <input type="text" name="cod" required><br>
        <label for="type">Tipo:</label>
        <input type="text" name="type" required><br>
        <label for="text1">Texto 1:</label>
        <input type="text" name="text1" required><br>
        <!-- Outros campos aqui... -->
        <label for="blocked">Bloqueado:</label>
        <input type="checkbox" name="blocked"><br>
        <button type="submit">Criar</button>
    </form>

    <!-- Listagem dos produtos -->
    <h2>Listagem de Produtos</h2>
    <ul>
        @foreach ($products as $product)
        <li>
            <strong>Código:</strong> {{ $product->cod }}<br>
            <strong>Tipo:</strong> {{ $product->type }}<br>
            <strong>Texto 1:</strong> {{ $product->text1 }}<br>
            <!-- Outros campos aqui... -->
            <strong>Bloqueado:</strong> {{ $product->blocked ? 'Sim' : 'Não' }}<br>
            <a href="{{ route('products.edit', ['id' => $product->id]) }}">Editar</a>
            <a href="{{ route('products.delete', ['id' => $product->id]) }}">Excluir</a>
            <a href="{{ route('products.block', ['id' => $product->id]) }}">Bloquear</a>
        </li>
        @endforeach
    </ul>

    <!-- Script para excluir um produto -->
    <script>
        function deleteProduct(id) {
            if (confirm('Tem certeza de que deseja excluir este produto?')) {
                const url = "{{ route('products.delete', ['id' => ':id']) }}".replace(':id', id);
                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                .then(response => {
                    if (response.status === 204) {
                        console.log('Produto excluído com sucesso!');
                        location.reload();
                    } else {
                        console.error('Erro ao excluir o produto:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Erro ao excluir o produto:', error);
                });
            }
        }
    </script>
</body>
</html>
