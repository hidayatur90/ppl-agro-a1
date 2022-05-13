<div class="card mt-3">
    <div class="card-header text-start">
        <strong>Tambah Data</strong> 
    </div>
    <div class="card-body">
        <p>Masukkan data penjualan :</p>
        <div class="border p-3">
            <form class="row" method="post" action="/penjualan/store">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                {{-- Nama Produk --}}
                <div class="mb-3 col-xl-6 col-md-12">
                    <label for="namaProduk" class="form-label">Nama Produk</label>
                    <input type="text" id="namaProduk" list="listNama" class="form-control" name="namaProduk" placeholder="Nama Produk" autocomplete="off" required oninvalid="this.setCustomValidity('Nama tidak boleh Kosong')" oninput="this.setCustomValidity('')"/>
                    <datalist id="listNama" >
                        @foreach ($nama_produk as $np)
                            <option>{{ $np->nama }}</option>
                        @endforeach
                    </datalist>
                    @if($errors->has('namaProduk'))
                    <div class="text-danger">
                        {{ $errors->first('namaProduk')}}
                    </div>
                    @endif
                </div>

                {{-- Kategori --}}
                <div class="mb-3 col-xl-6 col-md-12">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" id="kategori" list="listKategori" class="form-control" name="kategori" placeholder="Kategori" autocomplete="off" required oninvalid="this.setCustomValidity('Kategori tidak boleh Kosong')" oninput="this.setCustomValidity('')"/>
                    <datalist id="listKategori" >
                        @foreach ($nama_kategori as $nk)
                            <option>{{ $nk->kategori }}</option>
                        @endforeach
                    </datalist>
                    @if($errors->has('kategori'))
                    <div class="text-danger">
                        {{ $errors->first('kategori')}}
                    </div>
                    @endif
                </div>

                {{-- Kuantitas --}}
                <div class="mb-3 col-xl-6 col-md-12">
                    <label for="kuantitas" class="form-label">Kuantitas</label>
                    <input name="kuantitas" type="number" min="0" class="form-control" id="kuantitas" placeholder="Jumlah Kuantitas"/>
                </div>

                {{-- Harga Total --}}
                <div class="mb-3 col-xl-6 col-md-12">
                    <label for="harga" class="form-label">Harga Total</label>
                    <input name="harga" readonly type="number" class="form-control" id="harga" placeholder="Harga Total"/>
                </div>

                <div>
                    <button class="btn btn-success w-100">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>