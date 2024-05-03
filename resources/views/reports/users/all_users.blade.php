@extends('layouts.app')

@section('content')

    <head>
        <title>Export HTML Table Data to Excel using JavaScript | Tutorialswebsite</title>
        <script type="text/javascript">
            function exportToExcel(tableID, filename = '') {
                var downloadurl;
                var dataFileType = 'application/vnd.ms-excel';
                var tableSelect = document.getElementById(tableID);
                var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');

                // Specify file name
                filename = filename ? filename + '.xls' : 'export_excel_data.xls';

                // Create download link element
                downloadurl = document.createElement("a");

                document.body.appendChild(downloadurl);

                if (navigator.msSaveOrOpenBlob) {
                    var blob = new Blob(['\ufeff' + tableHTMLData], {
                        type: dataFileType
                    });
                    navigator.msSaveOrOpenBlob(blob, filename);
                } else {
                    // Create a link to the file
                    downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;

                    // Setting the file name
                    downloadurl.download = filename;

                    //triggering the function
                    downloadurl.click();
                }
            }
        </script>
    </head>

    <body>
        <div>
            <br>

            <button onclick="exportToExcel('tblexportData', 'user-data')" class="btn btn-success">Export Table Data To Excel File</button>
    <br>     <br>

</div>
        <div class="container">

            <table id="tblexportData" class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nome</th>
                        <th>email</th>
                        <th>created at</th>
                        <th>updated at</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                                        @if(empty($user))
                                        <p>No register found please, register a new user to continue</p>
                                            @else
                                            <tr class="alert">
                                            <td value="{{ $user->id }}"> {{ $user->id }} </td>
                                                <td value="{{ $user->id }}"> {{ $user->name }} </td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>{{ $user->updated_at }}</td>
                                                <td>{{ $user->blocked}}</a>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                </tbody>
            </table>


        </div>
    </body>
@endsection
