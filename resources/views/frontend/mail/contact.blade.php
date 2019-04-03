<p>你有一个新的联系请求， 详情如下：</p>

<p><strong>用户名:</strong> {{ $request->name }}</p>
<p><strong>电子邮件:</strong> {{ $request->email }}</p>
<p><strong>电话:</strong> {{ $request->phone or "N/A" }}</p>
<p><strong>消息:</strong> {{ $request->message }}</p>
