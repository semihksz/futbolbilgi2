@extends('admin.layout.app')

@section('content')
    <h6 class="mb-0 text-uppercase">{{ $season_id->season_date }} Erkek Futbol A Takımı Takım Kadrosu</h6>
    <hr />
    <style>
        .my-swal {
            background: #000000;
        }
    </style>
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: @json(session('success')),
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                    popup: 'my-swal'
                },
            });
        </script>
    @endif

    @if ($errors->any())
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: @json(implode('<br>', $errors->all())),
                customClass: {
                    popup: 'my-swal'
                },
            });
        </script>
    @endif

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Yeni Oyuncu Ekle
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Yeni Oyuncu Ekle</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('takim-kadrosu.store') }}" class="needs-validation" method="post"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row">
                            <input type="hidden" name="team" value="erkek-futbol-a-takim" required />
                            <input type="hidden" name="season_id" value="{{ $season_id->id }}" required />
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="bsValidation2" class="form-label">Eklemek İstediğiniz Dili Seçiniz</label>
                                    <select class="form-select" aria-label="Default select example" id="bsValidation2"
                                        required name="lang">
                                        <option value="tr">Türkçe</option>
                                        <option value="en">İngilizce</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="bsValidation8" class="form-label">Oyuncu Resmi</label>
                                    <input type="file" name="image" id="bsValidation8" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="bsValidation1" class="form-label">Adı Soyadı</label>
                                    <input type="text" name="name" id="bsValidation1" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="bsValidation2" class="form-label">Uyruğu</label>
                                    <select class="form-select" aria-label="Default select example" id="bsValidation2"
                                        name="nationality" required>
                                        <option>Bir Ülke Seçiniz</option>
                                        <option value="tr">Türkiye</option>
                                        <option value="ar">Arjantin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="bsValidation3" class="form-label">Mevkisi</label>
                                    <input type="text" name="position" id="bsValidation3" class="form-control"
                                        required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="bsValidation4" class="form-label">Doğum Tarihi</label>
                                    <input class="result form-control" type="text" id="date" name="birthday"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="bsValidation6" class="form-label">Boy</label>
                                    <input type="number" name="height" id="bsValidation6" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="bsValidation7" class="form-label">Kilo</label>
                                    <input type="number" name="weight" id="bsValidation7" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="bsValidation7" class="form-label">Forma Numarası</label>
                                    <input type="number" name="shirt_number" id="bsValidation7" class="form-control"
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Oyuncunun Hayatı</label>
                            <textarea class="form-control" name="biography" id="editor" rows="3"></textarea>
                        </div>
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">İptal</button>
                        <button type="submit" class="btn btn-danger">Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Adı</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($playersTr as $player)
                                    <tr>
                                        <td><img src="{{ asset('assets/images/players') . '/' . $player->image }}"
                                                alt="{{ $player->image }}" class="rounded-circle me-2"
                                                style="max-width:50px">
                                            {{ $player->name }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $player->id }}">
                                                <i class="fa fa-pencil text-warning" aria-hidden="true"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop{{ $player->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel{{ $player->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="staticBackdropLabel{{ $player->id }}">
                                                                {{ $player->name }}</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('takim-kadrosu.update', ['takim_kadrosu' => $player->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="team"
                                                                    value="erkek-futbol-a-takim" required />
                                                                <input type="hidden" name="season_id"
                                                                    value="{{ $season_id->id }}" required />
                                                                <input type="hidden" name="lang"
                                                                    value="{{ $player->lang }}" required />
                                                                <div class="mb-3">
                                                                    <img src="{{ asset('assets/images/players' . '/' . $player->image) }}"
                                                                        alt="" class="mb-2">
                                                                    <input type="file" class="form-control"
                                                                        name="image" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Oyuncu
                                                                        Adı</label>
                                                                    <input type="text" class="form-control"
                                                                        name="name" value="{{ $player->name }}" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Oyuncu
                                                                        Uyruğu</label>
                                                                    <input type="text" class="form-control"
                                                                        name="nationality"
                                                                        value="{{ $player->nationality }}" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Oyuncu
                                                                        Mevkisi</label>
                                                                    <select class="form-select form-select-md"
                                                                        name="position">
                                                                        @if ($player->position == 'kal')
                                                                            <option value="kal" selected>Kaleci</option>
                                                                            <option value="def">Defans</option>
                                                                            <option value="os">Orta Saha</option>
                                                                            <option value="fv">Forvet</option>
                                                                        @elseif ($player->position == 'def')
                                                                            <option value="def" selected>Defans</option>
                                                                            <option value="kal">Kaleci</option>
                                                                            <option value="os">Orta Saha</option>
                                                                            <option value="fv">Forvet</option>
                                                                        @elseif ($player->position == 'os')
                                                                            <option value="os" selected>Orta Saha
                                                                            </option>
                                                                            <option value="kal">Kaleci</option>
                                                                            <option value="def">Defans</option>
                                                                            <option value="fv">Forvet</option>
                                                                        @elseif ($player->position == 'fv')
                                                                            <option value="fv" selected>Forvet</option>
                                                                            <option value="kal">Kaleci</option>
                                                                            <option value="def">Defans</option>
                                                                            <option value="os">Orta Saha</option>
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Oyuncu
                                                                        Doğum Tarihi</label>
                                                                    <input type="date" class="form-control"
                                                                        name="birthday"
                                                                        value="{{ $player->birthday }}" />
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <div class="mb-3">
                                                                            <label for=""
                                                                                class="form-label">Oyuncu
                                                                                Boyu</label>
                                                                            <input type="text" class="form-control"
                                                                                name="height"
                                                                                value="{{ $player->height }}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="mb-3">
                                                                            <label for=""
                                                                                class="form-label">Oyuncu
                                                                                Kilosu</label>
                                                                            <input type="text" class="form-control"
                                                                                name="weight"
                                                                                value="{{ $player->weight }}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="mb-3">
                                                                            <label for=""
                                                                                class="form-label">Oyuncu
                                                                                Forma Numarası</label>
                                                                            <input type="text" class="form-control"
                                                                                name="shirt_number"
                                                                                value="{{ $player->shirt_number }}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Oyuncu
                                                                        Hayatı</label>
                                                                    <textarea class="form-control" id="editor1" cols="30" rows="10" name="biography">{{ $player->biography }}</textarea>
                                                                </div>
                                                                <button type="button" class="btn btn-warning"
                                                                    data-bs-dismiss="modal">İptal</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Güncelle</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="table-responsive">
                        <table id="example3" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Adı</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($playersEn as $player)
                                    <tr>
                                        <td><img src="{{ asset('assets/images/players') . '/' . $player->image }}"
                                                alt="{{ $player->image }}" class="rounded-circle me-2"
                                                style="max-width:50px">
                                            {{ $player->name }}</td>
                                        <td><button type="button" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $player->id }}">
                                                <i class="fa fa-pencil text-warning" aria-hidden="true"></i>
                                            </button>
                                            <div class="modal fade" id="staticBackdrop{{ $player->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel{{ $player->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="staticBackdropLabel{{ $player->id }}">
                                                                {{ $player->name }}</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('takim-kadrosu.update', ['takim_kadrosu' => $player->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <img src="{{ asset('assets/images/players' . '/' . $player->image) }}"
                                                                        alt="" class="mb-2">
                                                                    <input type="file" class="form-control"
                                                                        name="" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Oyuncu
                                                                        Adı</label>
                                                                    <input type="text" class="form-control"
                                                                        name="name" value="{{ $player->name }}" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Oyuncu
                                                                        Uyruğu</label>
                                                                    <input type="text" class="form-control"
                                                                        name="nationality"
                                                                        value="{{ $player->nationality }}" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Oyuncu
                                                                        Mevkisi</label>
                                                                    <select class="form-select form-select-md"
                                                                        name="{{ $player->position }}">
                                                                        @if ($player->position == 'kal')
                                                                            <option value="kal" selected>Kaleci</option>
                                                                            <option value="def">Defans</option>
                                                                            <option value="os">Orta Saha</option>
                                                                            <option value="fv">Forvet</option>
                                                                        @elseif ($player->position == 'def')
                                                                            <option value="def" selected>Defans</option>
                                                                            <option value="kal">Kaleci</option>
                                                                            <option value="os">Orta Saha</option>
                                                                            <option value="fv">Forvet</option>
                                                                        @elseif ($player->position == 'os')
                                                                            <option value="os" selected>Orta Saha
                                                                            </option>
                                                                            <option value="kal">Kaleci</option>
                                                                            <option value="def">Defans</option>
                                                                            <option value="fv">Forvet</option>
                                                                        @elseif ($player->position == 'fv')
                                                                            <option value="fv" selected>Forvet</option>
                                                                            <option value="kal">Kaleci</option>
                                                                            <option value="def">Defans</option>
                                                                            <option value="os">Orta Saha</option>
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Oyuncu
                                                                        Doğum Tarihi</label>
                                                                    <input type="date" class="form-control"
                                                                        name="birthday"
                                                                        value="{{ $player->birthday }}" />
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <div class="mb-3">
                                                                            <label for=""
                                                                                class="form-label">Oyuncu
                                                                                Boyu</label>
                                                                            <input type="text" class="form-control"
                                                                                name="height"
                                                                                value="{{ $player->height }}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="mb-3">
                                                                            <label for=""
                                                                                class="form-label">Oyuncu
                                                                                Kilosu</label>
                                                                            <input type="text" class="form-control"
                                                                                name="weight"
                                                                                value="{{ $player->weight }}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="mb-3">
                                                                            <label for=""
                                                                                class="form-label">Oyuncu
                                                                                Forma Numarası</label>
                                                                            <input type="text" class="form-control"
                                                                                name="shirt_number"
                                                                                value="{{ $player->shirt_number }}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Oyuncu
                                                                        Hayatı</label>
                                                                    <textarea class="form-control" id="editor1" cols="30" rows="10" name="biography">{{ $player->biography }}</textarea>
                                                                </div>
                                                                <button type="button" class="btn btn-warning"
                                                                    data-bs-dismiss="modal">İptal</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Güncelle</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
