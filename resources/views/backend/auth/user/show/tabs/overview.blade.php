<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>头像</th>
                <td><img src="{{ $user->picture }}" class="user-profile-image" /></td>
            </tr>

            <tr>
                <th>名称</th>
                <td>{{ $user->name }}</td>
            </tr>

            <tr>
                <th>电子邮件</th>
                <td>{{ $user->email }}</td>
            </tr>

            <tr>
                <th>状态</th>
                <td>{!! $user->status_label !!}</td>
            </tr>

            <tr>
                <th>已确认</th>
                <td>{!! $user->confirmed_label !!}</td>
            </tr>

            <tr>
                <th>Timezone</th>
                <td>{{ $user->timezone }}</td>
            </tr>

            <tr>
                <th>Last Login At</th>
                <td>
                    @if($user->last_login_at)
                        {{ timezone()->convertToLocal($user->last_login_at) }}
                    @else
                        N/A
                    @endif
                </td>
            </tr>

            <tr>
                <th>Last Login IP</th>
                <td>{{ $user->last_login_ip ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>
</div><!--table-responsive-->
