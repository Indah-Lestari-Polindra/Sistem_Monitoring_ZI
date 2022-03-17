@extends('master')
@section('laporanevaluasiactive','active')
@section('title',"Laporan Evaluasi")
@section('content')
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end align-items-center">
                @if (auth()->user()->role=="admin")  
                  <a class="btn btn-primary" data-toggle="modal" data-target="#add">Tambah Laporan Evaluasi</a>
                @endif
            </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="unitkerjatable" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                        <th>Rencana aksi</th>
                        <th>Area Perubahan</th>
                        <th>Target Waktu</th>
                        <th>Realisasi</th>
                        @if (auth()->user()->role=="admin")  
                          <th>Action</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                        <td>Example</td>
                        <td>Manajemen Peralatan</td>
                        <td>20 Mei 2022</td>
                        <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</td>                        
                        @if (auth()->user()->role=="admin")                       
                          <td>
                              <a href="#"  data-toggle="modal" data-target="#edit" class="btn btn-warning btn-sm">Edit</a>
                              <a href="#"  data-toggle="modal" data-target="#hapus" class="btn btn-danger btn-sm">Delete</a>
                          </td>
                        @endif
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan Evaluasi</h5>
          <a class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body">
          <label for="">Rencana Aksi</label><br>
          <textarea name="rencana_aksi" id="" cols="30" rows="10" class="form-control"></textarea><br>
          <label for="">Area Perubahan</label><br>
          <select name="area_perubahan" id="" class="form-control">
            <option value="1">Manajemen Perlatan</option>
            <option value="1">Manajemen Perubahan</option>
          </select><br>
          <label for="">Target Waktu</label><br>
          <input type="date" name="tanggal_waktu" id="" class="form-control">
          <label for="">Rencana Realisasi</label><br>
          <input type="text" name="realisasi" id="" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-sm">Submit</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Laporan Evaluasi</h5>
          <a class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body">
          <label for="">Rencana Aksi</label><br>
          <textarea name="rencana_aksi" id="" cols="30" rows="10" class="form-control"></textarea><br>
          <label for="">Area Perubahan</label><br>
          <select name="area_perubahan" id="" class="form-control">
            <option value="1">Manajemen Perlatan</option>
            <option value="1">Manajemen Perubahan</option>
          </select><br>
          <label for="">Target Waktu</label><br>
          <input type="date" name="tanggal_waktu" id="" class="form-control">
          <label for="">Rencana Realisasi</label><br>
          <input type="text" name="realisasi" id="" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-sm">Submit</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Laporan Evaluasi</h5>
          <a class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body">  
            <h4>Apa kamu yakin untuk menghapusnya ?</h4>        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-success btn-sm">Ya</button>
        </div>
      </div>
    </div>
</div>
@push('scriptjs')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $('#unitkerjatable').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    });
</script>
@endpush
@endsection