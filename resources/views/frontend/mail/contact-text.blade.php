你有一个新的联系请求， 详情如下：

用户名: {{ $request->name }}
电子邮件: {{ $request->email }}
电话: {{ $request->phone or "N/A" }}
消息: {{ $request->message }}
