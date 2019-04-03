@extends('backend.layouts.app')

@section('content')
    @include('vendor.ueditor.assets')

    {{ html()->form('POST', route('admin.setting.configure.save',$category->id))->class('form-horizontal')->open() }}
    <div class="card">

        <div class="card-body border-bottom mb-5">
            <h4 class="card-title mb-0">
                配置管理

                <small class="text-muted">
                    {{ $category->name }}
                </small>
            </h4>
        </div>

        <div class="table-responsive">
            <table class="table table-borderless">
                @foreach($items as $item)
                    <tr>
                        @if($item->type == "split")
                            <th class="text-right w-25">&nbsp;</th>
                            <td>
                                <div class="mt-5 h2 text-primary font-weight-normal">
                                    {{ $item->name }}
                                    <span class="text-muted">::..</span>
                                </div>
                            </td>
                            <td class="w-25 text-muted">&nbsp;</td>
                        @else
                            <th class="w-25 text-right" style="line-height: 1">
                                <div>{{ $item->name }}</div>
                                <small class="text-muted">{{$category->slug}}.{{$item->slug}}</small>
                            </th>
                            <td class="w-50">@include('backend.setting.inputs.'.$item->type)</td>
                            <td class="w-25">
                                <small class="text-muted">{{ $item->getMeta('help') }}</small>
                            </td>
                        @endif
                    </tr>
                @endforeach

                {{--submit button --}}
                <tr>
                    <th class="text-right w-25">&nbsp;</th>
                    <td>{{ form_submit('保存')->class('mr-2') }}</td>
                    <td class="w-25">&nbsp;</td>
                </tr>
            </table>
        </div>

    </div>
    {{ html()->form()->close() }}
@endsection
