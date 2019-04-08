@extends('backend.layouts.finder')

@section('title',  '文件管理')

@section('content')
    <div class="row">
        @foreach($files as $file)
            <div class="col-2 text-center">
                @if($file['type'] == 'folder')
                    <a class="card  text-secondary text-decoration-none" href="{{  route("admin.finder.dir", ['d'=>$file['path']] ) }}" title="{{ $file['name'] }}">
                    <div class="card-body"><i class="fa fa-folder fa-8x"></i></div>
                @else
                    @if($file['mode'] == "open")
                        <a class="card text-decoration-none text-secondary" href="{{  asset("storage".$file['path']) }}" target="_blank">
                        <div class="card-body"><img src="{{  asset("storage".$file['path']) }}" alt="" class="img-fluid"></div>
                    @else
                        <a class="card text-decoration-none text-secondary" href="{{  route("admin.finder.download", ['file'=>$file['path']]) }}" target="_blank">
                        <div class="card-body"><i class="fa fa-{{ $file['type'] }} fa-8x"></i></div>
                    @endif
                @endif
                    <div class="card-body pt-0 text-body h-25">{{ $file['name'] }}</div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
