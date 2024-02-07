<div class="my-5">
    <div class="card" style="border-radius: 10px">

        <div class="card-body">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-10 col-lg-10 ">
                    <b class="">Data Sekolah</b>
                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 ">
                    
                    <button class="btn btn-primary btn-block" wire:click='tambah' type="button" id="tombolCollapseUser">
                        Tambah Data
                    </button>
                </div>


            </div>
            <div class="collapse mb-2" id="collapseUser" wire:ignore.self>

                <div class="card" style="border-radius: 10px">
                    <div class=" card-body">
                        <b class="text-bold">{{ $kondisi }} Data</b>
                        <hr>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                wire:model='nama' placeholder="Nama">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                wire:model='email' placeholder="email">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer ">
                            <div class="ml-auto">
                                <a href="#" wire:click="save('{{ $id_user }}')" id="simpan" class="btn btn-primary">Simpan</a>
                                <button id="tombolBatalUser" class="btn btn-dark">Batal</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- Data Pengguna --}}
            <div class="card-body table-responsive p-0 border" style="height: 500px;border-radius: 10px;">
                <table class="table table-head-fixed table-hover text-nowrap ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userList as $data)
                        <tr wire:click="detail('{{ $data->id_user }}')" style="cursor:pointer" class="listCollapseUser">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    @push('scripts')
      <script>
        $(document).ready(function() {
          $('#tombolCollapseUser').click(function() {
            $('#collapseUser').collapse('show');
          });
          $('.listCollapseUser').click(function() {
            $('#collapseUser').collapse('show');
          });
          $('#tombolBatalUser').click(function() {
            $('#collapseUser').collapse('hide');
          });
        });
      </script>
    @endpush
</div>