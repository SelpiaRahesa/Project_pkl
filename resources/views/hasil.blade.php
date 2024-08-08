@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Form Penilaian Kinerja Guru') }}</div>

                    <div class="card-body">
                        @if (Auth::user()->isAdmin == 'atasan')
                            <tbody class="table-border-bottom-0">
                                @php $i=1; @endphp
                                @foreach ($pkgAtasan as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            {{-- @if($data->pkgAtasan) --}}
                                                {{$data->pertanyaan}}
                                            {{-- @else --}}
                                                {{-- pertanyaan tidak ditemukan --}}
                                            {{-- @endif --}}
                                        </td>
                                        <td><div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                              Terpenuhi
                                            </label>
                                          </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                Sebagian Terpenuhi
                                                </label>
                                              </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                  Tidak Terpenuhi
                                                </label>
                                              </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{-- Tampilkan konten khusus untuk Atasan --}}
                        @elseif(Auth::user()->isAdmin == 'guru')
                        <tbody class="table-border-bottom-0">
                            @php $i=1; @endphp
                            @foreach ($pkgGuru as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
z                                    <td>
                                        {{-- @if($data->pkgAtasan) --}}
                                            {{$data->pertanyaan}}
                                        {{-- @else --}}
                                            {{-- pertanyaan tidak ditemukan --}}
                                        {{-- @endif --}}
                                    </td>
                                    <td><div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Terpenuhi
                                        </label>
                                      </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                            Sebagian Terpenuhi
                                            </label>
                                          </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                              Tidak Terpenuhi
                                            </label>
                                          </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                            {{-- Tampilkan konten khusus untuk Guru --}}
                        @elseif(Auth::user()->isAdmin == 'siswa')
                        <tbody class="table-border-bottom-0">
                            @php $i=1; @endphp
                            @foreach ($pkgSiswa as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        {{-- @if($data->pkgAtasan) --}}
                                            {{$data->pertanyaan}}
                                        {{-- @else --}}
                                            {{-- pertanyaan tidak ditemukan --}}
                                        {{-- @endif --}}
                                    </td>
                                    <td><div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Terpenuhi
                                        </label>
                                      </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                            Sebagian Terpenuhi
                                            </label>
                                          </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                              Tidak Terpenuhi
                                            </label>
                                          </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                            {{-- Tampilkan konten khusus untuk Siswa --}}
                        @endif
                        <button type="submit" class="btn btn-sm btn-primary">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
