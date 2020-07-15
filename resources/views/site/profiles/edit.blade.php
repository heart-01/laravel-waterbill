@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-10 col-log-offset-1">
            <div class="card mt-3" style="font-family: kanit;">
                <div class="card-header h3">
                    แก้ไขข้อมูลส่วนตัว : {{ $users->name }}
                </div>
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-warning text-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>**{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <?= Form::model($users, array('url' => 'profiles/' . Crypt::encrypt($users->id),'method' => 'put','files' => true)) ?>
                        <div class="form-group">
                            <?= Form::label('name', 'ชื่อ-สกุล'); ?>
                            <?= Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อ-นามสกุล', 'autocomplete'=> 'off']); ?>
                        </div>
                        <div class="form-group">
                            <?= Form::label('email', 'อีเมล'); ?>
                            <?= Form::text('email',null,['class' => 'form-control','placeholder' => 'name@domain.com', 'autocomplete'=> 'off']); ?>
                        </div>
                        <div class="form-group">
                            <?= Form::label('tel', 'โทรศัพท์'); ?>
                            <?= Form::text('tel', isset($users->profiles->tel) ? $users->profiles->tel : null, ['class' => 'form-control', 'placeholder' => 'หมายเลขโทรศัพท์', 'autocomplete'=> 'off']); ?>
                        </div>
                        <div>
                            <a href="{{ asset('images/'.$users->profiles->image) }}" data-lity>
                                <img src="{{asset('images/resize/'.$users->profiles->image) }}" style="width:100px">
                            </a>
                            <p class="font-weight-bold mt-1" >แก้ไขรูปโปรไฟล์</p>
                            <input type="file" name="picture" onchange="loadFile(this)" >
                            <div class="mt-2">
                                <img src="" id="img" style="height: 160px;width: 140px;background-color: #ccc;border: 2px solid gray;cursor: pointer;" data-lity>
                            </div>
                        </div>
                        @if (session('status')==1)
                            <div class="form-group mt-2">
                                <?= Form::label('status', 'สถานะ'); ?>
                                <?= Form::select('status', App\Status_User::all()->pluck('status', 'status_id'), isset($users->profiles->status_id) ? $users->profiles->status_id : null, ['class' => 'form-control', 'placeholder' =>'กรุณาเลือกสถานะ...']); ?>
                            </div>
                        @elseif (session('status')==2)
                            <div class="form-group mt-2">
                                <?= Form::hidden('status', isset($users->profiles->status_id) ? $users->profiles->status_id : null, ['class' => 'form-control', 'placeholder' => 'กรุณาเลือกสถานะ...']); ?>
                            </div>
                        @endif
                        <div class="form-group text-center">
                            <?= Form::submit('ตกลง', ['class' => 'btn btn-success']); ?>
                        </div>
                    <?= Form::close() ?>

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
    $("#img").hide();
    function loadFile(e){
        $("#img").show();
        var output = document.getElementById('img');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

@endsection