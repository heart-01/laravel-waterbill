@extends('layouts.dashboard')

@section('content')
<link href="{{ asset('css/site/profiles/changePassword.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="font-family: kanit;">
                <div class="card-header h3">
                    แก้ไขรหัสผ่าน : {{ Auth::user()->name }}
                </div>
   
                <div class="card-body">
                    <form method="POST" action="{{ route('profiles.change.password') }}">
                        @csrf 
   
                        @if (count($errors) > 0)
                        <div class="alert alert-warning text-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>**{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">กรอกรหัสผ่านเดิม</label>
  
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">กรอกรหัสผ่านใหม่</label>
  
                            <div class="input-group col-md-6 input-container">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">

                                <div class="input-group-append">
                                    <div class="input-group-text" style="cursor: pointer;">
                                        <i class="material-icons visibility">visibility_off</i>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">ยืนยันรหัสผ่านใหม่อีกครั้ง</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>
   
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    ตกลง
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session()->has('Success'))
    <script>
        swal("<?php echo session()->get('Success'); ?>", "", "success");
    </script>
@endif

<script>
    const visibilityToggle = document.querySelector('.visibility');
    const input = document.querySelector('.input-container input');
    var password = true;
    visibilityToggle.addEventListener('click', function() {
        if (password) {
            input.setAttribute('type', 'text');
            visibilityToggle.innerHTML = 'visibility';
        } else {
            input.setAttribute('type', 'password');
            visibilityToggle.innerHTML = 'visibility_off';
        }
        password = !password;
    });
</script>


@endsection