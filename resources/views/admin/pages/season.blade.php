@extends('admin.layout.app')

@section('content')
    <h6 class="mb-0 text-uppercase">Türkiye Süper Ligi Sezonları</h6>
    <hr />
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Yeni Sezon Ekle
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Yeni Sezon Ekle</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sezon.store') }}" class="needs-validation" method="post"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="bsValidation1" class="form-label">Sezon Adı</label>
                                <input type="text" name="season_date" id="bsValidation1" class="form-control" required />
                            </div>
                        </div>
                        <button type="button" class="btn btn-warning w-25" data-bs-dismiss="modal">İptal</button>
                        <button type="submit" class="btn btn-danger w-25">Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="col-lg-12">
                <div class="row text-center">
                    <div class="col-lg-4">
                        <a href="{{ route('takim-kadrosu.show', ['takim_kadrosu' => $season->slug]) }}">
                            <div class="card">
                                <div class="card-body p-5">
                                    <h4 class="card-title">Takım Kadrosu</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="{{ route('teknik-kadro.show', ['teknik_kadro' => $season->slug]) }}">
                            <div class="card">
                                <div class="card-body p-5">
                                    <h4 class="card-title">İdari ve Teknik Kadro</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="">
                            <div class="card">
                                <div class="card-body p-5">
                                    <h4 class="card-title">Puan Durumu</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="">
                            <div class="card">
                                <div class="card-body p-5">
                                    <h4 class="card-title">Fikstür</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


            {{-- <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sezon Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seasons as $season)
                            <tr>
                                <td>{{ $season->season_date }}</td>
                                <td><a href="{{ route('takim-kadrosu.show', ['takim_kadrosu' => $season->slug]) }}"
                                        class="btn btn-danger">Sezonun Detayına
                                        Git</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> --}}
        </div>
    </div>
@endsection
