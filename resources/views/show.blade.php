<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <style>
            td,
            th {
                font-size: 11px;
            }
        </style>

        <title>TES - Venturo Camp Tahap 2</title>
    </head>
<body>
    <div class="container-fluid">
        <div class="card" style="margin: 2rem 0rem;">
            <div class="card-header">
                Venturo - Laporan penjualan tahunan per {{ request('tahun') }}
            </div>
            <div class="card-body">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <select id="my-select" class="form-control" name="tahun">
                                    <option value="2021" {{ request('tahun') == '2021' ? 'selected' : '' }}>2021</option>
                                    <option value="2022" {{ request('tahun') == '2022' ? 'selected' : '' }}>2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">
                                Tampilkan
                            </button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" style="margin: 0;">
                        <thead>
                            <tr class="table-dark">
                                <th rowspan="2" style="text-align:center;vertical-align: middle;width: 250px;">Menu</th>
                                <th colspan="12" style="text-align: center;">Periode Pada {{ request('tahun') }}
                                </th>
                                <th rowspan="2" style="text-align:center;vertical-align: middle;width:75px">Total</th>
                            </tr>
                            <tr class="table-dark">
                                <th style="text-align: center;width: 75px;">Jan</th>
                                <th style="text-align: center;width: 75px;">Feb</th>
                                <th style="text-align: center;width: 75px;">Mar</th>
                                <th style="text-align: center;width: 75px;">Apr</th>
                                <th style="text-align: center;width: 75px;">Mei</th>
                                <th style="text-align: center;width: 75px;">Jun</th>
                                <th style="text-align: center;width: 75px;">Jul</th>
                                <th style="text-align: center;width: 75px;">Ags</th>
                                <th style="text-align: center;width: 75px;">Sep</th>
                                <th style="text-align: center;width: 75px;">Okt</th>
                                <th style="text-align: center;width: 75px;">Nov</th>
                                <th style="text-align: center;width: 75px;">Des</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-secondary" colspan="14"><b>Makanan</b></td>
                            </tr>
                            @foreach ($alldata['data']['makanan'] as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    @php
                                        $jan = ($value['Jan'] == 0) ? ' ' : number_format($value['Jan'], 0, '.', ',');
                                        $feb = ($value['Feb'] == 0) ? ' ' : number_format($value['Feb'], 0, '.', ',');
                                        $mar = ($value['Mar'] == 0) ? ' ' : number_format($value['Mar'], 0, '.', ',');
                                        $apr = ($value['Apr'] == 0) ? ' ' : number_format($value['Apr'], 0, '.', ',');
                                        $mei = ($value['May'] == 0) ? ' ' : number_format($value['May'], 0, '.', ',');
                                        $jun = ($value['Jun'] == 0) ? ' ' : number_format($value['Jun'], 0, '.', ',');
                                        $jul = ($value['Jul'] == 0) ? ' ' : number_format($value['Jul'], 0, '.', ',');
                                        $ags = ($value['Aug'] == 0) ? ' ' : number_format($value['Aug'], 0, '.', ',');
                                        $sep = ($value['Sep'] == 0) ? ' ' : number_format($value['Sep'], 0, '.', ',');
                                        $okt = ($value['Oct'] == 0) ? ' ' : number_format($value['Oct'], 0, '.', ',');
                                        $nov = ($value['Nov'] == 0) ? ' ' : number_format($value['Nov'], 0, '.', ',');
                                        $des = ($value['Dec'] == 0) ? ' ' : number_format($value['Dec'], 0, '.', ',');
                                    @endphp
                                    <td style="text-align: right;">{{ $jan }}</td>
                                    <td style="text-align: right;">{{ $feb }}</td>
                                    <td style="text-align: right;">{{ $mar }}</td>
                                    <td style="text-align: right;">{{ $apr }}</td>
                                    <td style="text-align: right;">{{ $mei }}</td>
                                    <td style="text-align: right;">{{ $jun }}</td>
                                    <td style="text-align: right;">{{ $jul }}</td>
                                    <td style="text-align: right;">{{ $ags }}</td>
                                    <td style="text-align: right;">{{ $sep }}</td>
                                    <td style="text-align: right;">{{ $okt }}</td>
                                    <td style="text-align: right;">{{ $nov }}</td>
                                    <td style="text-align: right;">{{ $des }}</td>
                                    <td style="text-align: right;">{{ number_format($alldata['totalmenu'][$key], 0, '.', ',') }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="table-secondary" colspan="14"><b>Minuman</b></td>
                            </tr>
                            @foreach ($alldata['data']['minuman'] as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    @php
                                        $jan = ($value['Jan'] == 0) ? ' ' : number_format($value['Jan'], 0, '.', ',');
                                        $feb = ($value['Feb'] == 0) ? ' ' : number_format($value['Feb'], 0, '.', ',');
                                        $mar = ($value['Mar'] == 0) ? ' ' : number_format($value['Mar'], 0, '.', ',');
                                        $apr = ($value['Apr'] == 0) ? ' ' : number_format($value['Apr'], 0, '.', ',');
                                        $mei = ($value['May'] == 0) ? ' ' : number_format($value['May'], 0, '.', ',');
                                        $jun = ($value['Jun'] == 0) ? ' ' : number_format($value['Jun'], 0, '.', ',');
                                        $jul = ($value['Jul'] == 0) ? ' ' : number_format($value['Jul'], 0, '.', ',');
                                        $ags = ($value['Aug'] == 0) ? ' ' : number_format($value['Aug'], 0, '.', ',');
                                        $sep = ($value['Sep'] == 0) ? ' ' : number_format($value['Sep'], 0, '.', ',');
                                        $okt = ($value['Oct'] == 0) ? ' ' : number_format($value['Oct'], 0, '.', ',');
                                        $nov = ($value['Nov'] == 0) ? ' ' : number_format($value['Nov'], 0, '.', ',');
                                        $des = ($value['Dec'] == 0) ? ' ' : number_format($value['Dec'], 0, '.', ',');
                                    @endphp
                                    <td style="text-align: right;">{{ $jan }}</td>
                                    <td style="text-align: right;">{{ $feb }}</td>
                                    <td style="text-align: right;">{{ $mar }}</td>
                                    <td style="text-align: right;">{{ $apr }}</td>
                                    <td style="text-align: right;">{{ $mei }}</td>
                                    <td style="text-align: right;">{{ $jun }}</td>
                                    <td style="text-align: right;">{{ $jul }}</td>
                                    <td style="text-align: right;">{{ $ags }}</td>
                                    <td style="text-align: right;">{{ $sep }}</td>
                                    <td style="text-align: right;">{{ $okt }}</td>
                                    <td style="text-align: right;">{{ $nov }}</td>
                                    <td style="text-align: right;">{{ $des }}</td>
                                    <td style="text-align: right;">{{ number_format($alldata['totalmenu'][$key], 0, '.', ',') }}</td>
                                </tr>
                            @endforeach
                            <tr class="table-dark">
                                <td><b>Total</b></td>
                                @foreach ($alldata['totalBulan'] as $key => $value)
                                    <td style="text-align: right;"><b>{{ number_format($value, 0, '.', ',') }}</b></td>
                                @endforeach
                                <td style="text-align: right;"><b>{{ number_format($alldata['total'], 0, '.', ',') }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
