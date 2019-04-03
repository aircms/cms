@extends('backend.layouts.app')

@section('content')

    <div class="card">

        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        联系我们

                        <small class="text-muted">
                            查看详情
                        </small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row">
                <div class="col table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th class="text-right w-25">姓名</th>
                            <td>{{ $contact->name }}</td>
                        </tr>

                        <tr>
                            <th class="text-right w-25">年龄</th>
                            <td>{{ $contact->age }}</td>
                        </tr>

                        <tr>
                            <th class="text-right">性别</th>
                            <td>{{ $contact->sex_text }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">电话</th>
                            <td>{{ $contact->phone_number }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">邮箱</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">地址</th>
                            <td>{{ $contact->address }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">咨询标题</th>
                            <td>{{ $contact->title }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">咨询内容</th>
                            <td>{{ $contact->message }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">回复</th>
                            <td>{{ $contact->reply }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">消息通道</th>
                            <td>{{ $contact->reply_channel_text }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--card-body-->
    </div><!--card-->
@endsection
