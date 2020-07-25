@extends('adminlte::page')
@section('title', 'Labkom FMIPA UNS | Jasa Print')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Print</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Jasa Print</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="jasaprint-success" data-flashdata="{{ session('success') }}"></div>
    <div class="jasaprint-warning" data-flashdata="{{ session('warning') }}"></div>
    <div class="jasaprint-danger" data-flashdata="{{ session('danger') }}"></div>
@endsection

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Print</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool">
                    <a href="{{ route('JasaPrint.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-user-plus"></i>
                        Insert
                    </a>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-bordered">
                <thead class="thead-light">
                <tr>
                    <th class="text-center">
                        No
                    </th>
                    <th class="text-center">
                        Tanggal
                    </th>
                    <th class="text-center">
                        Jenis Print
                    </th>
                    <th class="text-center">
                        Harga Print
                    </th>
                    <th>
                        #
                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach($JasaPrint as $elemen)
                    <tr>
                        <td class="text-center">
                            {{ ($JasaPrint->currentPage() - 1) * $JasaPrint->perPage() + $loop->index + 1 }}
                        </td>
                        <td class="text-center">
                            <a>
                                {{ $elemen->tanggal_print }}
                            </a>
                        </td>
                        <td class="text-center">
                            <a>
                                {{ $elemen->jenis_print }}
                            </a>
                        </td>
                        <td class="text-center">
                            <a>
                                Rp.{{ $elemen->harga_print }}
                            </a>
                        </td>
                        <td class="project-actions text-right">
                            <button class="btn btn-secondary btn-sm detail-jasaprint-button" type="button" data-toggle="modal" data-target="#jasaprintModal" data-showurl="{{ route('JasaPrint.show', $elemen->id) }}">
                                <i class="fas fa-folder"></i>
                                Detail
                            </button>
                            <a class="btn btn-info btn-sm" href="{{ route('JasaPrint.edit', $elemen->id) }}">
                                <i class="fas fa-pencil-alt"></i>
                                Edit
                            </a>
                            <form action="{{ route('JasaPrint.destroy', $elemen->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm delete-jasaprint-button d" type="submit">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <section class="d-flex align-items-center justify-content-center mt-3">
                {{ $JasaPrint->links() }}
            </section>
        </div>
        <!-- /.card-body -->
        <div id="detail-jasaprint"></div>
    </div>
    <!-- /.card -->
@endsection
