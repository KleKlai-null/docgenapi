<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        font: 14px/1.4 Georgia, serif;
    }

    #page-wrap {
        width: 680px;
        margin: 0 auto;
    }

    #header {
        height: 70px;
        width: 100%;
        margin: 20px 0;
        text-align: center;
        color: white;
        font: bold 15px Arial, Sans-Serif;
        text-decoration: uppercase;
        letter-spacing: 15px;
        padding: 8px 0px;
    }

    #title {
        height: 15px;
        width: 100%;
        margin: 20px 0;
        text-align: center;
        color: #000000;
        font: bold 25px Times New Roman, Times, serif;
        text-decoration: uppercase;
        padding: 8px 0px 15px 0px;
    }

    #logo {
        text-align: right;
        float: right;
        position: relative;
        margin-top: -15px;
        max-width: 570px;
        max-height: 130px;
    }

    #footer {
        margin-top: 0px;
        width: 230px;
        float: right;
    }

    .grid-container {
        display: grid;
        grid-template: 150px / auto auto auto;
        grid-gap: 10px;
        padding: 10px;
    }

    .grid-container>div {
        text-align: center;
    }

    .contentText {
        text-align: center;
        margin-top: -20px;
        font-size: 15px;
    }

    /* DivTable.com */
    .divTable {
        display: table;
        width: 100%;
    }

    .divTableRow {
        display: table-row;
    }

    .divTableHeading {
        background-color: #EEE;
        display: table-header-group;
    }

    .divTableCell,
    .divTableHead {
        border: 1px solid transparent;
        display: table-cell;
    }

    .divTableHeading {
        background-color: #EEE;
        display: table-header-group;
        font-weight: bold;
    }

    .divTableFoot {
        background-color: #EEE;
        display: table-footer-group;
        font-weight: bold;
    }

    .divTableBody {
        display: table-row-group;
    }

    .text-muted {
        font-size: 12px;
    }
</style>

<body>

    <div id="page-wrap">

        <h1 id="header">
            <img src="asset/images/gfi_logo.jpg" width="300" class="header">
        </h1>


        <h1 id="title">
            MEMORANDUM
        </h1>
        <hr>

        <div class="divTable" style="width: 50%; margin-top: 30px">
            <div class="divTableBody">
                <div class="divTableRow">
                    <div class="divTableCell">Date:</div>
                    <div class="divTableCell">{{ $data->created_at->format('F d, Y') }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell">ID No.</div>
                    <div class="divTableCell">{{ $data->id_no }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell">Name of Employee</div>
                    <div class="divTableCell">{{ $data->name_of_employee }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell">Department</div>
                    <div class="divTableCell">{{ $data->department }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell">Section</div>
                    <div class="divTableCell">{{ $data->section }}</div>
                </div>
                <h3 style="padding: 10px 10px 10px 0px;">ASSET</h3>
                <div class="divTableRow">
                    <div class="divTableCell">Code</div>
                    <div class="divTableCell">{{ $data->asset_code }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell">Type</div>
                    <div class="divTableCell">{{ $data->asset_type }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell">Description</div>
                    <div class="divTableCell">{{ $data->asset_description }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell">Serial No.</div>
                    <div class="divTableCell">{{ $data->asset_serial_no }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell">Value</div>
                    <div class="divTableCell">{{ $data->asset_value }}</div>
                </div>
            </div>
        </div>
        <div>
            <div id="logo">
                <img src="data:image/png;base64, {!! $qrcode !!}">
                <br />
                <span class="text-muted">{{ $data->document_series_no }}</span>
            </div>
        </div>
    </div>
</body>

</html>
