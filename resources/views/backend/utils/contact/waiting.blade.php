@extends('backend.layouts.app')


@section('breadcrumb-links')
    @include('backend.utils.contact.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        等待回复
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.post.type.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>姓名</th>
                            <th>性别</th>
                            <th>年龄</th>
                            <th>电话</th>
                            <th>邮箱</th>
                            <th>创建日期</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->sex_text }}</td>
                                <td>{{ $contact->age }}</td>
                                <td>{{ $contact->phone_number }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->created_at }}</td>

                                <td>
                                    <a href="{{ route('admin.utils.contact.reply', $contact->id) }}"
                                       class="btn btn-primary btn-sm">
                                        回复
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--card-body-->
        @if ($contacts->hasMorePages())
            <div class="card-footer">
                {!! $contacts->links() !!}
            </div>
        @endif
    </div><!--card-->
@endsection

