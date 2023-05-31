@extends('sidebar')
@section('content')

<form action="{{ route('rabs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No :</strong>
                <input type="text" id="no_rab" name="no_rab" class="form-control" placeholder="Masukan No RAB">
                @error('no_rab')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal :</strong>
                <input type="date" name="location" class="form-control" placeholder="Masukan Lokasi">
                @error('location')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <label for="id_penyusun"><strong>Penyusun :</strong></label>
            <select name="id_penyusun" class="form-control">
                @foreach ($managers as $manager)
                <option value="{{ $manager->id}}">{{$manager->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="row col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group col-10">
                <input type="text" id="search" name="search" class="form-control" placeholder="Masukan Nama Product">
                @error('search')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-2">
                <button type="text" class="btn btn-secondary"> Tambah</button>

            </div>
        </div>
        <div class="row col-xs-12 col-sm-12 col-md-12 mt-3">
            <table id="example" class="table table-hover" style="width:100%">
                <thead class="thead-dark">
                    <tr class=" table-active">
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Manager ID</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>

                </tbody>
            </table>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            <a button type="submit" class="btn btn-danger mt-4" href="{{ route('rabs.index') }}">Back</a>

            <div class="col-xs-12 col-sm-12 col-md-12">

            </div>
        </div>
    </div>
</form>
@endsection
@section('js')
<script type="text/javascript">
    var path = "{{ route('searchproduct') }}";

    $("#search").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: path,
                type: 'GET',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            $('#search').val(ui.item.label);
            console.log(ui.item);
            return false;
        }
    });
</script>
@endsection