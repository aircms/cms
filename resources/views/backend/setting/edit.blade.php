@extends('backend.layouts.app')

@section('content')
    {{ html()->form('POST', route('admin.setting.item.update',$item->id))->class('form-horizontal')->open() }}
    <div class="card">

        <div class="card-body">

            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        参数配置

                        <small class="text-muted">
                            编辑
                        </small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="form-group">
                {{ html()->label('分组')->for('type') }}
                {{ html()->select('group',$settingCategories->toFlatTree()->flatMap(function($item){
                    return [$item->slug => $item->name];
                }),$item->categories->first()->slug)->class('form-control') }}
            </div>

            <div class="form-group">
                {{ html()->label('名称')->for('name') }}
                {{ html()->text('name',$item->name)->class('form-control')->attribute('maxlength', 190)->required()->autofocus() }}
            </div>

            <div class="form-group">
                {{ html()->label('别名')->for('slug') }}
                {{ html()->text('slug',$item->slug)->class('form-control')->attribute('maxlength', 190) }}
            </div>

            <div class="form-group">
                {{ html()->label('类型')->for('type') }}
                {{ html()->select('type',\App\Traits\SettingItemType::types(),$item->type)->class('form-control') }}
            </div>

            <div class="form-group">
                {{ html()->label('选项列表')->for('items') }}
                {{ html()->textarea('items',$item->items)->class('form-control')->attribute('rows',5) }}
                <small class="text-muted form-text">仅单选、多选时生效， 格式： key:value 一行一个</small>
            </div>

        </div>

        <div class="card-footer">
            {{ form_submit('创建')->class('mr-2') }}
        </div>


    </div>
    {{ html()->form()->close() }}
@endsection

