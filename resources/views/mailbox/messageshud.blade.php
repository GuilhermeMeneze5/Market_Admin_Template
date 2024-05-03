@extends('layouts.app')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('newmessage') }}"class="btn btn-primary btn-block mb-3">New Message</a>
                @include('layouts.emailmenu')
            </div>

            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Inbox</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" id="searchInput" placeholder="Search Mail">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" id="searchButton">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            <script>
                                const searchInput = document.getElementById('searchInput');
                                const searchButton = document.getElementById('searchButton');

                                searchButton.addEventListener('click', () => {
                                    const searchText = searchInput.value.trim();
                                    if (searchText !== '') {
                                        // Aqui você pode adicionar a lógica de busca com o texto fornecido
                                        alert(`Você está buscando: ${searchText}`);
                                    }
                                });

                                searchInput.addEventListener('keyup', event => {
                                    if (event.key === 'Enter') {
                                        searchButton.click();
                                    }
                                });
                            </script>

                        </div>

                    </div>

                    <div class="card-body p-0">

                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    @if (!empty($messages))
                                        @foreach ($messages as $message)
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check1">
                                                        <label for="check1"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="/read/message/{{$message->id}}"><i
                                                            class="fas fa-star text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="/read/message/{{$message->id}}">{{ $message->from }}</a>
                                                </td>
                                                <td class="mailbox-subject">
                                                    <b>{{ strlen($message->title) > 30 ? substr($message->title, 0, 30) . '...' : $message->title }}</b>
                                                    -
                                                    @if (!empty($message->message))
                                                        {!! strlen($message->message) > 30
                                                            ? substr(strip_tags($message->message), 0, 30) . '...'
                                                            : strip_tags($message->message) !!}
                                                    @else
                                                        No message content.
                                                    @endif
                                                </td>
                                                <td class="mailbox-attachment"></td>
                                                <td class="mailbox-date">{{ $message->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        No message content.
                                    @endif

                                </tbody>
                            </table>

                        </div>

                    </div>

                    <div class="card-footer p-0">

                    </div>
                </div>

            </div>

        </div>

    </section>
@endsection
