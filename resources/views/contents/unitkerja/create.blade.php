@extends('master')
@section('unitkerjaactive','active')
@section('title',"Unit Kerja")
@section('content')
<div class="container-fluid py-4">
    <div class="error"></div>
    <div class="success"></div>    
    <div id="accordion">
        <div class="card mb-3">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button style="font-size: 16px;" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Input Unit Kerja
              </button>
            </h5>
            <hr>
          </div>
          <div style="margin-top: -45px;" id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" name="name" id="" class="form-control" placeholder="Nama Unit Kerja">
                        </div><br>
                        <button type="button" id="submitformunitkerja" class="btn btn-success">Tambah</button>
                    </div>
                    <div class="col-md-6">
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td></td>
                                    <td>Unit Kerja</td>
                                </tr>
                            </thead>
                            <tbody id="getallunitkerja"></tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button style="font-size: 16px;" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
               Assign Unit Kerja To User
              </button>
            </h5>
            <hr>
          </div>
          <div style="margin-top: -45px;" id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Pilih User</label> <br>
                        <div class="input-group">
                            <select name="id" id="user" class="form-control">
                                <option disabled selected>Pilih</option>
                                @foreach ($user as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div> 
                        <br>                        
                        <label for="">Pilih Unit Kerja</label> <br>
                        <div class="input-group">                           
                            <select name="unit_kerja_id" id="unit_kerja_id" class="form-control">
                                
                            </select>
                        </div> <br>
                        <button type="button" class="btn btn-success btn-assign">Assign To User</button>
                    </div>
                </div>
            </div>
          </div>
        </div>        
      </div>
</div>
@push('scriptjs')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>    
    // $(document).ready(function(){
    $('#user').select2({
        width:"100%"
    });
    $('#unit_kerja_id').select2({
        width:"100%"
    });
    const unitKerja = ()=>{
        $('#unit_kerja_id').html("");
        return (            
            $.ajax({
                url:"{{route('unitkerja.getall')}}",
                method:"POST",
                data:{
                    "_token":"{{csrf_token()}}"
                },
                success: function(res){
                    res.map(val=>{
                        $('#unit_kerja_id').append(`
                            <option value='${val.id}'>${val.name}</option>
                        `);
                    })
                }
            })
        )
    }

    const tableUnitKerja = () => {
        $('#getallunitkerja').html("")
        return $.ajax({
            url:"{{route('unitkerja.getall')}}",
            method:"POST",
            data:{
                "_token":"{{csrf_token()}}"
            },
            success: function(res){
                res.map((val,i)=>{
                    $('#getallunitkerja').append(`
                        <tr>
                            <td>${i+1}</td>
                            <td>${val.name}</td>    
                        </tr>
                    `);
                })
            }
        })
    }

    unitKerja()
    tableUnitKerja()

    $("#submitformunitkerja").click(()=>{
        var name = $("[name='name']").val();        
        $.ajax({
            url:"{{route('unitkerja.store')}}",
            data:{
                name:name,
                "_token":"{{csrf_token()}}"
            },
            method:"POST",
            success:function(res){
                console.log(res);
                
                if (res.type == false) {
                    var html = `
                        <div style="color: white;" class="d-flex justify-content-between align-items-center alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="d-flex justify-content-start align-item-center">
                                <strong>${res.status}!</strong>&nbsp;${res.message.toString()}
                            </div>
                                <a href="0:;javascript(0)" style="color: white; font-size:20px;" class="d-flex justify-content-end align-items-right close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                        </div>`
                    $('.error').html(html)
                }else{
                    unitKerja()
                    tableUnitKerja()
                    var html = `
                        <div style="color: white;" class="d-flex justify-content-between align-items-center alert alert-success alert-dismissible fade show" role="alert">
                            <div class="d-flex justify-content-start align-item-center">
                                <strong>${res.status}!</strong>&nbsp;${res.message}
                            </div>
                                <a href="0:;javascript(0)" style="color: white; font-size:20px;" class="d-flex justify-content-end align-items-right close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                        </div>`
                    $('.success').html(html)
                }
            }
        });
    });
    $('.btn-assign').click(()=>{

    })
    // });
</script>
@endpush
@endsection