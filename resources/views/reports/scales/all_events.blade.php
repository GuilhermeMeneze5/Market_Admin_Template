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
                        <th>name event</th>
                        <th>start</th>
                        <th>end</th>
                        <th>destination</th>
                        <th>description</th>
                    </tr>
                </thead>
                <tbody>
                @if(empty($events))
                    <p>No register found please, register a new user to continue</p>
                @else
                   @foreach ($events as $event)
                   <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->name_event }}</td>
                        <td>{{ $event->start }}</td>
                        <td>{{ $event->end }}</td>
                        <td>{{ $event->destination }}</td>
                        <td>{{ $event->description }}</td>
                    </tr>

                    @endforeach
                @endif
                </tbody>
            </table>


        </div>
    </body>
@endsection
