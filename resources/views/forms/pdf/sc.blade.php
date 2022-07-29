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
        padding: 3px 0px;
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
            SERVICE CALL
        </h1>

        <hr>

        <div class="divTable" style="margin-top: 15px; ">
            <div class="divTableBody">
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">Created on</div>
                    <div class="divTableCell">{{ $data->created_at->format('F d, Y') }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">Customer Name</div>
                    <div class="divTableCell">{{ $data->customer_name }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">Contact Person</div>
                    <div class="divTableCell">{{ $data->contact_number }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">Phone No.</div>
                    <div class="divTableCell">{{ $data->phone_no }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">Item No.</div>
                    <div class="divTableCell">{{ $data->item_no }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">Description</div>
                    <div class="divTableCell">{{ $data->description }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">MFR Serial No.</div>
                    <div class="divTableCell">{{ $data->mfr_serial_no }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">Serial No.</div>
                    <div class="divTableCell">{{ $data->serial_no }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">Subject</div>
                    <div class="divTableCell">{{ $data->subject }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">Origin</div>
                    <div class="divTableCell">{{ $data->origin }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">Problem Type</div>
                    <div class="divTableCell">{{ $data->problem_type }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">Assigned To</div>
                    <div class="divTableCell">{{ $data->assigned_to }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">Priority</div>
                    <div class="divTableCell">{{ $data->priority }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">Call Type</div>
                    <div class="divTableCell">{{ $data->call_type }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">Technician</div>
                    <div class="divTableCell">{{ $data->created_at->format('F d, Y') }}</div>
                </div>
                <div class="divTableRow">
                    <div class="divTableCell" style="font-weight: bold;">Remarks</div>
                    <div class="divTableCell">{{ $data->remarks }}</div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
