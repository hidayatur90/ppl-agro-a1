@extends('layouts.app')
  
@section('content')
@include('partials.navbar')
@include('partials.sidebarOwner')
    <div id="layoutSidenav_content">    
        <style>
            strong, ::placeholder {
                font-family: 'Poppins', sans-serif;
            }
        </style>
        <main>
            <div class="container-fluid px-4 py-4">
                <div class="header">
                    <h4><strong>Edit Profil Owner</strong></h4>
                </div>
                <hr>
                <div class="form-edit">
                    <form method="post" action="/ownerMitra/update/{{$owner->id}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        {{-- Nama --}}
                        <div class="row mb-3">
                            <label for="nama" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Nama</strong></label>
                            <div class="col-sm-8 col-md-9 col-xl-10">
                                <input type="text" class="form-control" name="namaMitra" id="namaMitra" placeholder="Nama" required value="{{$owner->namaMitra}}" oninvalid="this.setCustomValidity('Nama tidak boleh Kosong')" oninput="this.setCustomValidity('')"/>
                                @if($errors->has('namaMitra'))
                                <div class="text-danger">
                                    {{ $errors->first('namaMitra')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        {{-- No Telepon --}}
                        <div class="row mb-3">
                            <label for="phone" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Nomor Handphone</strong></label>
                            <div class="col-sm-8 col-md-9 col-xl-10">
                                <input type="text" pattern="[0-9]{10,13}" class="form-control" name="noTelepon" id="noTelepon" placeholder="08xxxxxxxxxx" required value="{{$owner->noTelepon}}" oninvalid="this.setCustomValidity('Mohon diisi dengan angka, minimal 10 digit, maksimal 13 digit')" oninput="this.setCustomValidity('')" onkeypress='validate(event)'/>
                                @if($errors->has('noTelepon'))
                                <div class="text-danger">
                                    {{ $errors->first('noTelepon')}}
                                </div>
                            @endif
                            </div>
                        </div>
                        {{-- Alamat --}}
                        <div class="row mb-3">
                            <label for="address" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Alamat</strong></label>
                            <div class="col-sm-8 col-md-9 col-xl-10">
                                <textarea type="textarea" class="form-control" name="alamat" id="alamat" rows="4" placeholder="Alamat" required oninvalid="this.setCustomValidity('Alamat tidak boleh Kosong')" oninput="this.setCustomValidity('')">{{$owner->alamat}}</textarea>
                                @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="form-group d-none">
                            <label>Owner</label>
                            <select name="type_id" class="form-control" value="{{$owner->type_id}}">
                                <option value="1">1</option>
                            </select>
                             @if($errors->has('type_id'))
                                <div class="text-danger">
                                    {{ $errors->first('type_id')}}
                                </div>
                            @endif
                        </div>

                        <!-- Button -->
                        <div class="row mb-3 justify-content-end mx-3">
                            <div class="col-sm-8 col-md-9 col-xl-10" style="text-align:end;">
                                <input type="submit" class="btn btn-success mx-3" value="Simpan">
                                <a type="button" class="btn btn-light border" href="/ownerMitra">
                                    Batal
                                </a>
                            </div>
                        </div>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </main>
    <script>
        function validate(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
        // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
        }
    </script>
@endsection