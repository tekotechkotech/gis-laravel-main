<div class=" my-5">
    <div class="row">
        <div class="col-sm-12 col-md-7 col-lg-8">
            <div class="jumbotron bg-white" style="border-radius: 10px;padding-top:200px">
                {{-- <img src="{{ asset('img/logo.png') }}" style="width: 200px;" class="text-center mb-5"> --}}
                <h4 class="text-right">Selamat datang di layanan peta digital <br><b>PT LPP Agro Nusantara</b></h4>
                {{-- <h6 class="display-4">Selamat datang di layanan peta digital</h6> --}}
                <hr class="my-4 ">
                <p class="text-right">Di sini, kami menyediakan layanan peta digital untuk membantu Anda menavigasi dan menjelajahi informasi geografis dengan mudah.</p>
              </div>
        </div>
        <div class="col-sm-12 col-md-5 col-lg-4">
            <div class="jumbotron" style="border-radius: 10px">
                <img src="{{ asset('img/logo.png') }}" style="width: 200px;" class="text-center mb-5">
                <h4 class="">Login</h4>
                {{-- <h6 class="display-4">Selamat datang di layanan peta digital</h6> --}}
                <hr class="my-4">
                <form wire:submit.prevent="login">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input wire:model="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input wire:model='password' type="password" class="form-control" id="exampleInputPassword1">
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                    <button type="submit"  class="btn btn-success btn-block">Login</button>
                    
                  </form>

                {{-- <a class="btn btn-success btn-sm" wire:navigate href="/maps" role="button">Kunjungi Peta Digital</a> --}}
              </div>
        </div>
    </div>
</div>
