@push("after-styles")
    <link rel="stylesheet" href="{{ asset("js/codemirror-5.44.0/lib/codemirror.css") }}">

    <style>
        .CodeMirror {
            border: 1px solid #e4e7ea;
            height: auto;
        }
    </style>
@endpush

@push('after-scripts')
    <script src="{{ asset("js/codemirror-5.44.0/lib/codemirror.js") }}"></script>
    <script src="{{ asset("js/codemirror-5.44.0/mode/yaml/yaml.js") }}"></script>
    <script>
      var editor = CodeMirror.fromTextArea(document.getElementById("{{ $component }}"), {
        lineNumbers: true,
        viewportMargin: Infinity,
        tabSize: 2,
      })
      editor.setOption('extraKeys', {
        Tab: function (cm) {
          var spaces = Array(cm.getOption('indentUnit') + 1).join(' ')
          cm.replaceSelection(spaces)
        },
      })
    </script>
@endpush

