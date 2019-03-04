<!-- form field -->
{{ html()->div()->attributes(\Illuminate\Support\Arr::get($wrapper,'all',[]))->open() }}

    {{ html()->label(\Illuminate\Support\Arr::get($label,'name'))->attributes(\Illuminate\Support\Arr::get($label,'attributes',[])) }}

    {{ html()->div()->attributes(\Illuminate\Support\Arr::get($wrapper,'input',[]))->open() }}

        {{
        html()
        ->text(\Illuminate\Support\Arr::get($input,'name',""),\Illuminate\Support\Arr::get($input,'value',""))
        ->attributes(\Illuminate\Support\Arr::get($input,'attributes',[]))
        }}

    {{ html()->div()->close() }}
{{ html()->div()->close() }}
