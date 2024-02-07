<div class="my-5">
    <div class="card" style="border-radius: 10px">
        <div class="card-body" >
            {{-- Data Pengguna --}}
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Data Admin</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Data User</button>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="card-body table-responsive p-0 border" style="height: 500px;border-radius: 10px;">
                        <table class="table table-head-fixed text-nowrap " >
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Nama</th>
                              <th>Email</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($adminList as $data)
                              <tr 
                              {{-- wire:click="detail('{{ $data->id_user }}')"  --}}
                                id="listCollapseKontak">
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $data->name }}</td>
                                  <td>{{ $data->email }}</td>
                              </tr>                
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card-body table-responsive p-0 border" style="height: 500px;border-radius: 10px;">
                        <table class="table table-head-fixed text-nowrap " >
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Nama</th>
                              <th>Email</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($userList as $data)
                              <tr 
                              {{-- wire:click="detail('{{ $data->id_user }}')"  --}}
                                id="listCollapseKontak">
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
        </div>
    </div>
</div>
