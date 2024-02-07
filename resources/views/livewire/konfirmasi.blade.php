<div class="my-5">
    <div class="card" style="border-radius: 10px">

        <div class="card-body">
            <b class="">Data Konfirmasi</b>
            
            {{-- Data Pengguna --}}
            <div class="card-body table-responsive p-0 border" style="height: 500px;border-radius: 10px;">
                <table class="table table-head-fixed table-hover text-nowrap ">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userList as $data)
                        <tr class="bg-light">
                            <td class="text-center">{{ $a=$loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td></td>
                        </tr>

                        @foreach (\App\Models\User::where('id_admin',$data->id_user)->where('status','0')->get() as $item)
                        <tr >
                            <td class="text-center">{{ $a }}.{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td><a href="#" class="btn btn-success btn-sm btn-block" wire:click="konfirmasi('{{ $item->id_user }}')">Konfirmasi</a></td>
                        </tr>
                        @endforeach
                        @endforeach
                        @if(count($userList)==0)
                        <tr><td colspan="4" class="text-center">Belum ada data yang membutuhkan konfirmasi</td></tr>
                        @endif
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