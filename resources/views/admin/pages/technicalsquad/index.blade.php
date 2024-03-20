@extends('admin.layout.app')

@section('content')
    <h6 class="mb-0 text-uppercase">{{ $season_id->season_date }} Erkek Futbol A Takımı İdari Ve Teknik Kadrosu</h6>
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
        Yeni Sorumlu Ekle
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
                    <form action="{{ route('teknik-kadro.store') }}" class="needs-validation" method="post"
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
                                    <label for="bsValidation3" class="form-label">Görevi</label>
                                    <input type="text" name="mission" id="bsValidation3" class="form-control" required />
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
                        <div class="mb-3">
                            <label for="" class="form-label">Sorumlunun Hayatı</label>
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
                                @foreach ($kadroTr as $kadro)
                                    <tr>
                                        <td><img src="{{ asset('assets/images/technical_squad') . '/' . $kadro->image }}"
                                                alt="{{ $kadro->image }}" class="rounded-circle me-2"
                                                style="max-width:50px">
                                            {{ $kadro->name }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $kadro->id }}">
                                                <i class="fa fa-pencil text-warning" aria-hidden="true"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop{{ $kadro->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel{{ $kadro->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="staticBackdropLabel{{ $kadro->id }}">
                                                                {{ $kadro->name }}</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('teknik-kadro.update', ['teknik_kadro' => $kadro->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="team"
                                                                    value="erkek-futbol-a-takim" required />
                                                                <input type="hidden" name="season_id"
                                                                    value="{{ $season_id->id }}" required />
                                                                <input type="hidden" name="lang"
                                                                    value="{{ $kadro->lang }}" required />
                                                                <div class="mb-3">
                                                                    <img src="{{ asset('assets/images/technical_squad' . '/' . $kadro->image) }}"
                                                                        alt="" class="mb-2">
                                                                    <input type="file" class="form-control"
                                                                        name="image" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">
                                                                        Adı</label>
                                                                    <input type="text" class="form-control"
                                                                        name="name" value="{{ $kadro->name }}" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">
                                                                        Uyruğu</label>
                                                                    <input type="text" class="form-control"
                                                                        name="nationality"
                                                                        value="{{ $kadro->nationality }}" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">
                                                                        Görevi</label>
                                                                    <input type="text" class="form-control"
                                                                        name="mission" value="{{ $kadro->mission }}" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">
                                                                        Doğum Tarihi</label>
                                                                    <input type="date" class="form-control"
                                                                        name="birthday" value="{{ $kadro->birthday }}" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">
                                                                        Hayatı</label>
                                                                    <textarea class="form-control" id="editor1" cols="30" rows="10" name="biography">{{ $kadro->biography }}</textarea>
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
                                @foreach ($kadroEn as $kadro)
                                    <tr>
                                        <td><img src="{{ asset('assets/images/technical_squad') . '/' . $kadro->image }}"
                                                alt="{{ $kadro->image }}" class="rounded-circle me-2"
                                                style="max-width:50px">
                                            {{ $kadro->name }}</td>
                                        <td><button type="button" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $kadro->id }}">
                                                <i class="fa fa-pencil text-warning" aria-hidden="true"></i>
                                            </button>
                                            <div class="modal fade" id="staticBackdrop{{ $kadro->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel{{ $kadro->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="staticBackdropLabel{{ $kadro->id }}">
                                                                {{ $kadro->name }}</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('teknik-kadro.update', ['teknik_kadro' => $kadro->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="team"
                                                                    value="erkek-futbol-a-takim" required />
                                                                <input type="hidden" name="season_id"
                                                                    value="{{ $season_id->id }}" required />
                                                                <input type="hidden" name="lang"
                                                                    value="{{ $kadro->lang }}" required />
                                                                <div class="mb-3">
                                                                    <img src="{{ asset('assets/images/technical_squad' . '/' . $kadro->image) }}"
                                                                        alt="" class="mb-2">
                                                                    <input type="file" class="form-control"
                                                                        name="image" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">
                                                                        Adı</label>
                                                                    <input type="text" class="form-control"
                                                                        name="name" value="{{ $kadro->name }}" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">
                                                                        Uyruğu</label>
                                                                    <input type="text" class="form-control"
                                                                        name="nationality"
                                                                        value="{{ $kadro->nationality }}" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">
                                                                        Görevi</label>
                                                                    <input type="text" class="form-control"
                                                                        name="mission" value="{{ $kadro->mission }}" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">
                                                                        Doğum Tarihi</label>
                                                                    <input type="date" class="form-control"
                                                                        name="birthday" value="{{ $kadro->birthday }}" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">
                                                                        Hayatı</label>
                                                                    <textarea class="form-control" id="editor2" cols="30" rows="10" name="biography">{{ $kadro->biography }}</textarea>
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
