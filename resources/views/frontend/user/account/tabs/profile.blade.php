<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th>头像</th>
            <td><img src="{{ $logged_in_user->picture }}" class="user-profile-image" /></td>
        </tr>
        <tr>
            <th>名称</th>
            <td>{{ $logged_in_user->name }}</td>
        </tr>
        <tr>
            <th>电子邮件</th>
            <td>{{ $logged_in_user->email }}</td>
        </tr>
        <tr>
            <th>创建于</th>
            <td>{{ timezone()->convertToLocal($logged_in_user->created_at) }} ({{ $logged_in_user->created_at->diffForHumans() }})</td>
        </tr>
        <tr>
            <th>最后更新</th>
            <td>{{ timezone()->convertToLocal($logged_in_user->updated_at) }} ({{ $logged_in_user->updated_at->diffForHumans() }})</td>
        </tr>
    </table>
</div>
