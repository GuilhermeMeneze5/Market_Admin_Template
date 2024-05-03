@extends('layouts.app')

@section('content')

    <head>
        <link href='{{ asset('assets/Trumbowyg-main/dist/ui/trumbowyg.min.css') }}' rel='stylesheet' />
        <link href='{{ asset('assets/select2/main.css') }}' rel='stylesheet' />
        <script type='text/javascript' href='{{ asset('assets/select2/main.js') }}'> </script>


       <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    </head>

    <body>
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('messageshud')}}" class="btn btn-primary btn-block mb-3">Back to Inbox</a>
                        @include('layouts.emailmenu')
                    </div>

                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Compose New Message</h3>
                        </div>
                        <form action="{{ route('/create-messages') }}" method="post">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label>To:</label>
                                    @if (count($users) > 0)
                                        <select class="js-example-basic-multiple form-control" placeholder="To:" name="to[]" id="to" multiple="multiple">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->email }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p>No users available for selection.</p>
                                    @endif
                                </div>
                                <label>Cc:</label>

                                <div class="form-group">
                                    @if (count($users) > 0)
                                        <select class="js-example-basic-multiple form-control" placeholder="Cc:" id="cc" name="cc[]" multiple="multiple">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->email }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p>No users available for selection.</p>
                                    @endif
                                </div>
                                <label>Subject:</label>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Subject:" name="title" id="title" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="trumbowyg" name="myTextarea" id="myTextarea"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="btn btn-default btn-file">
                                        <i class="fas fa-paperclip"></i> Attachment
                                        <input type="file" name="attachment">
                                    </div>
                                    <p class="help-block">Max. 32MB</p>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="float-right">
                                    <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i>
                                        Draft</button>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i>
                                        Send</button>
                                </div>
                                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('assets/Trumbowyg-main/dist/trumbowyg.min.js') }}"></script>
        <script src="{{ asset('assets/select2/main.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('.trumbowyg').trumbowyg();
                $('.js-example-basic-multiple').select2();
            });
        </script>
    </body>
@endsection
