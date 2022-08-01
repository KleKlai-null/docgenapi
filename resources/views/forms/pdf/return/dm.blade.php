<!DOCTYPE html>
<html lang="en">

<head>
    <title>PDF</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        font: 14px/1.4;
        font-family: "PT Sans", Calibri, Tahoma, sans-serif;
    }

    #page-wrap {
        width: 680px;
        margin: 0 auto;
    }

    textarea {
        border: 0;
        font: 14px Georgia, Serif;
        overflow: hidden;
        resize: none;
    }

    table {
        border-collapse: collapse;
    }

    table td,
    table th {
        border: 1px solid black;
        padding: 1px;
    }

    table td.borderless,
    table th.borderless {
        border: 0px solid black;
        padding: 1px;
    }

    table.borderless {
        border: 0px solid black;
        padding: 1px;
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

    #address {
        width: 250px;
        height: 150px;
        float: left;
    }

    #customer {
        overflow: hidden;
    }

    #logo {
        text-align: right;
        float: right;
        position: relative;
        margin-top: -15px;
        max-width: 570px;
        max-height: 130px;
    }

    #signature {
        clear: both;
        width: 100%;
        margin-top: 30px;
        border: 5px solid transparent;
        text-align: center;
    }

    #signature th {
        border: 5px solid transparent;
    }

    #signature td {
        border: 5px solid transparent;
    }

    #items {
        clear: both;
        width: 100%;
        margin: 5px 0 0 0;
        border: 1px solid black;
    }

    #items th {
        background: #eee;
    }

    #items textarea {
        width: 80px;
        height: 50px;
    }

    #items tr.item-row td {
        border: 0;
        vertical-align: top;
    }

    #items td.description {
        width: 300px;
    }

    #items td.item-name {
        width: 175px;
    }

    #items td.description textarea,
    #items td.item-name textarea {
        width: 100%;
    }

    #items td.total-line {
        border-right: 0;
        text-align: right;
    }

    #items td.total-value {
        border-left: 0;
        padding: 10px;
    }

    #items td.total-value textarea {
        height: 20px;
        background: none;
    }

    #items td.balance {
        background: #eee;
    }

    #items td.blank {
        border: 0;
    }

    #terms {
        text-align: left;
        margin: 15px 0 0 0;
    }

    p.sub {
        font-size: 10px;
    }

    #meta {
        margin-top: 0px;
        width: 300px;
        float: left;
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
        margin-top: -13px;
        font-size: 10px;
    }

    /* #meta td { text-align: left;  } */
    /* #meta td.meta-head { text-align: left; background: #eee; font-size: 15px } */
    #line {
        text-transform: uppercase;
        font: 13px Helvetica, Sans-Serif;
        letter-spacing: 10px;
        border-bottom: 1px solid black;
        padding: 1 0 8px 0;
        margin: 1 8px 0;
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
        <table id="meta">
            <tr>
                <td class="borderless">
                    <h6>Withdrawal Slip No.</h6>
                </td>
                <td class="borderless">
                    <div>
                        <p class="sub">{{ $data->withdrawal_slip_no }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="borderless">
                    <h6>Department</h6>
                </td>
                <td class="borderless">
                    <div>
                        <p class="sub">{{ $data->department }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="borderless">
                    <h6>Memorandum No.</h6>
                </td>
                <td class="borderless">
                    <div>
                        <p class="sub">{{ $data->mr_no }}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="borderless">
                    <h6>Date Created</h6>
                </td>
                <td class="borderless">
                    <div>
                        <p class="sub">{{ $data->created_at->format('F d, Y') }}</p>
                    </div>
                </td>
            </tr>
        </table>

        <div>
            <div id="logo">
                <img src="data:image/png;base64, {!! $qrcode !!}">
                <br />
                <span class="text-muted">{{ $data->document_series_no }}</span>
            </div>
        </div>

        <div style="clear:both"></div>

        <table id="items">
            <thead>
                <tr>
                    <th>Item Code</th>
                    <th>Item Description</th>
                    <th>Qty</th>
                    <th>Uom</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody class="item-row">
                @foreach ($data->items as $item)
                    <tr>
                        <td>{{ $item->item_code }}</td>
                        <td style="word-wrap: break-word; max-width: 150px;">{{ $item->item_description }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->uom }}</td>
                        <td>{{ $item->reason }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <table id="signature">
          <thead>
               <tr>
                    <th>Prepared by</th>
                    <th>Approved by</th>
                    <th>Released by</th>
               </tr>
          </thead>
          <tbody>
               <tr>
                    <td>{{ $data->prepared_by }}</td>
                    <td>{{ $data->approved_by }}</td>
                    <td>{{ $data->received_by }}</td>
               </tr>
          </tbody>
      </table>
    </div>
</body>

</html>