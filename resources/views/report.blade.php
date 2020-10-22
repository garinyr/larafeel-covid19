<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="select" style="width: 20rem; padding-top: 10px">
                    <form method="post" action="{{ url('/provinsi') }}">
                        @csrf
                        <div class="form-group">
                            <select name="provinsi" class="form-control">
                                <option value="" holder>Pilih Provinsi</option>
                                @foreach ($dataProvinsi as $datas)
                                @if (!empty($data['Kode_Provi']))
                                    <option value="{{ $datas['attributes']['Kode_Provi'] }}" {{ ($datas['attributes']['Kode_Provi'] ==  $data["Kode_Provi"] ? "selected" : "") }} holder>{{ $datas['attributes']['Provinsi'] }}</option>

                                @else
                                    <option value="{{ $datas['attributes']['Kode_Provi'] }}" holder>{{ $datas['attributes']['Provinsi'] }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-grup" style="padding-bottom: 10px">
                            <button type="submit" class="btn btn-info btn-block"> Cari Data</button>
                        </div>
                    </form>
                </div>

                <div class="card" style="width: 20rem;">
                    <img src="https://images.unsplash.com/photo-1583324113626-70df0f4deaab?ixlib=rb-1.2.1&auto=format&fit=crop&w=1189&q=80" class="card-img-top" alt="photo">
                    <div class="card-body">
                      <h5 class="card-title">Penyakit virus corona (COVID-19)</h5>
                      <p class="card-text text-justify">Virus yang menyebabkan COVID-19 terutama ditransmisikan melalui droplet (percikan air liur) yang dihasilkan saat orang yang terinfeksi batuk, bersin, atau mengembuskan nafas.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">
                            <h4>
                                @if (!empty($data['Kode_Provi']))

                                @else
                                    {{ $data["name"] }}
                                @endif
                            </h4>
                        </li>
                        @if (!empty($data['Kode_Provi']))
                        <li class="list-group-item text-center text-info">
                            <table width="100%">
                                <tr>
                                    <td class="text-center font-weight-bold">Provinsi</td>
                                </tr>
                                <tr>
                                    <td class="text-center text-info">{{ $data["Provinsi"] }}</td>
                                </tr>
                            </table>
                        </li>

                        @else
                        <li class="list-group-item text-center text-info">
                            <table width="100%">
                                <tr>
                                    <td class="text-center font-weight-bold">Confirm Case</td>
                                </tr>
                                <tr>
                                    <td class="text-center text-info">{{ $data["positif"] }}</td>
                                </tr>
                            </table>
                        </li>
                        @endif
                    </ul>
                    <div class="card-body">
                        <table width="100%">
                            <tr>
                                @if (!empty($data['Kode_Provi']))

                                    <td class="text-center font-weight-bold">Positif</td>
                                    <td class="text-center font-weight-bold">Sembuh</td>
                                    <td class="text-center font-weight-bold">Meninggal</td>
                                @else

                                    <td class="text-center font-weight-bold">Dirawat</td>
                                    <td class="text-center font-weight-bold">Meninggal</td>
                                    <td class="text-center font-weight-bold">Sembuh</td>
                                @endif
                            </tr>
                            <tr>
                                @if (!empty($data['Kode_Provi']))
                                    <td class="text-center text-warning">{{ number_format($data["Kasus_Posi"]) }}</td>
                                    <td class="text-center text-success">{{ number_format($data["Kasus_Semb"]) }}</td>
                                    <td class="text-center text-danger">{{ number_format($data["Kasus_Meni"]) }}</td>
                                @else
                                    <td class="text-center text-warning">{{ $data["dirawat"] }}</td>
                                    <td class="text-center text-danger">{{ $data["meninggal"] }}</td>
                                    <td class="text-center text-success">{{ $data["sembuh"] }}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="text-center">
                            <p class="card-text">MoonLight Dev</p>
                            {{-- <p class="card-text">{{ date('d/M/Y h:i:s', strtotime($data["lastUpdate"])) }}</p> --}}
                        </div>
                    </div>
                  </div>
            </div>

            <div class="col"></div>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>



