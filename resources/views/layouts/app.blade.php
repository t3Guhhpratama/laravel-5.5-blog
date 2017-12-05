<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>App Name - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <!-- css -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/medium-editor.min.css')}}" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="{{ asset('js/medium-editor.js') }}"></script>

        <script type="text/javascript" src="{{asset('js/medium-editor-insert-plugin.js')}}"></script>
    </head>
    <body>

      <div id="app">
            @yield('content')
      </div>
      <!-- js -->
      <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
      <script>
        // var editor = new MediumEditor('.editable');
        // $(function () {
        //     $('.editable').mediumInsert({
        //         editor: editor
        //     });
        // });
        // var editor = new MediumEditor('.editable', {
        //     buttonLabels: 'fontawesome',
        //     paste: {
        //         cleanPastedHTML: true,
        //         forcePlainText: false
        //     }
        // });
      </script>
    </body>
</html>
