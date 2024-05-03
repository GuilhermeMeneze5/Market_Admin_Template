<!DOCTYPE html>
<html>
<head>
    <title>TestOffers</title>
</head>
<body>
    <h1>TestOffers</h1>

    <!-- Formulário para criar uma oferta -->
    <h2>Criar Oferta</h2>
    <form action="{{ route('offers.create') }}" method="post">
        @csrf
        <label for="title">Título:</label>
        <input type="text" name="title" required><br>
        <label for="description">Descrição:</label>
        <textarea name="description" required></textarea><br>
        <label for="price">Preço:</label>
        <input type="number" name="price" required><br>
        <button type="submit">Criar</button>
    </form>

    <!-- Listagem das ofertas -->
    <h2>Listagem de Ofertas</h2>
    <ul>
        @foreach ($offers as $offer)
        <li>
            <strong>Título:</strong> {{ $offer->title }}<br>
            <strong>Descrição:</strong> {{ $offer->description }}<br>
            <strong>Preço:</strong> {{ $offer->price }}<br>
            <a href="{{ route('offers.edit', ['id' => $offer->id]) }}">Editar</a>
            <a href="{{ route('offers.delete', ['id' => $offer->id]) }}">Excluir</a>
        </li>
        @endforeach
    </ul>

    <!-- Script para bloquear/desbloquear uma oferta -->
    <script>
        function toggleBlock(id) {
            const url = "{{ route('offers.block', ['id' => ':id']) }}".replace(':id', id);
            fetch(url, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            .then(response => response.json())
            .then(offer => {
                console.log('Oferta bloqueada/desbloqueada:', offer);
            })
            .catch(error => {
                console.error('Erro ao bloquear/desbloquear oferta:', error);
            });
        }
    </script>
</body>
</html>
