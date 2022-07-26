<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="pdf.css" />
    <link rel="stylesheet" href="{{ asset('asset/css/qrcode.css') }}" />
    <script src="{{ asset('asset/js/html2pdf.bundle.js') }}"></script>
</head>

<body>
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <button class="btn btn-primary" id="download"> download pdf</button>
            </div>
            <div class="col-md-12">
                <div class="card" id="invoice">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4 pull-left">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-5 ">
                                    <div class="text-sm-right">
                                        <h4 class="mb-2 mt-md-2">Finished Goods</h4>
                                        <ul class="list list-unstyled mb-0">
                                            <li>Date: <span
                                                    class="font-weight-semibold">{{ $data->created_at->format('F d, Y') }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-flex flex-md-wrap">
                            <div class="mb-4 mb-md-2 text-left"> <span class="text-muted">Scan QR to verify</span>
                                <div id="qrcode"></div>
                                <span class="text-muted">{{ $data->document_series_no }}</span>
                            </div>
                            <div class="mb-2 ml-auto"> <span class="text-muted">Document Details:</span>
                                <div class="d-flex flex-wrap wmin-md-400">
                                    <ul class="list list-unstyled mb-0 text-left">
                                        <li>Batch No.:</li>
                                        <li>Pallet No.:</li>
                                        <li>Location:</li>
                                    </ul>
                                    <ul class="list list-unstyled text-right mb-0 ml-auto">
                                        <li><span class="font-weight-semibold">{{ $data->batch_no }}</span></li>
                                        <li>{{ $data->pallet_no }}</li>
                                        <li>{{ $data->location }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Uom</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data->items as $item)
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">{{ $item->item_code }}</h6>
                                            <span class="text-muted">{{ $item->item_description }}</span>
                                        </td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->uom }}</td>
                                        <td>{{ $item->remarks }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <div class="d-md-flex flex-md-wrap">
                            <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th class="text-left">Prepared by:</th>
                                                <td class="text-right">{{ $data->prepared_by }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">Approved by:</span></th>
                                                <td class="text-right">{{ $data->approved_by }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">Released by:</th>
                                                <td class="text-right">{{ $data->released_by }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card-footer"> <span class="text-muted">Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur.Duis aute irure dolor in reprehenderit</span> </div> --}}
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('asset/js/qrcode.js') }}"></script>

<script>
    window.onload = function() {
        document.getElementById("download")
            .addEventListener("click", () => {
                const invoice = this.document.getElementById("invoice");
                console.log(invoice);
                console.log(window);
                var opt = {
                    margin: 1,
                    filename: '{{ $data->document_series_no }}.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'legal',
                        orientation: 'portrait'
                    }
                };
                html2pdf().from(invoice).set(opt).save();
            })
    }
</script>

<script>
    var qrcode = new QRCode("qrcode", {
        text: "{{ $data->document_series_no }}",
        width: 115,
        height: 115,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
    });
</script>

</html>
