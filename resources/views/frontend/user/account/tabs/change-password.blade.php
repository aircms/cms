{{ html()->form('PATCH', route('frontend.auth.password.update'))->class('form-horizontal')->open() }}
    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label('旧密码')->for('old_password') }}

                {{ html()->password('old_password')
                    ->class('form-control')
                    ->placeholder('旧密码')
                    ->autofocus()
                    ->required() }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label('密码')->for('password') }}

                {{ html()->password('password')
                    ->class('form-control')
                    ->placeholder('密码')
                    ->required() }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label('确认密码')->for('password_confirmation') }}

                {{ html()->password('password_confirmation')
                    ->class('form-control')
                    ->placeholder('确认密码')
                    ->required() }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group mb-0 clearfix">
                {{ form_submit('更新' . ' ' . '密码') }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->
{{ html()->form()->close() }}
