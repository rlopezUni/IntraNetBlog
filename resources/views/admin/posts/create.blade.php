@extends('adminlte::page')

@section('title', 'Intranet Univer')

@section('content_header')
    <h1>Crear Post</h1>
@stop

@section('content')
    <div class="card">
        
        
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store','autocomplete' => 'off','files' => true]) !!}

            
            
            @include('admin.posts.partials.form')

                {!! Form::submit('Crear Post',['class' => 'btn btn-primary'])  !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop


@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;

        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

    </style>
@stop



@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
 <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

 <script>
     $(document).ready( function() {
  $("#name").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-'
  });
});

ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );

        //cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }

        $( "#name" ).on( "change", function() {
            var nombre = $("#name").val();
           var color = $("#color").val();
           $("#previ").removeClass();
           $("#previ").addClass("text-4xl  leading-8 font-bold mt-2");
          
        $("#previ").text(nombre);
  
        $("#previ").addClass("text-"+color); //blanco
        
        if (color == "black-600") {
            color = "black";
            $("#previ").addClass("text-"+color);
        }

        if (color == "red-600") {
            color = "red";
            $("#previ").addClass("text-"+color);
        }

        if (color == "yellow-600") {
            color = "yellow";
            $("#previ").addClass("text-"+color);
        }

        if (color == "green-600") {
            color = "green";
            $("#previ").addClass("text-"+color);
        }

        if (color == "blue-600") {
            color = "blue";
            $("#previ").addClass("text-"+color);
        }

        if (color == "indigo-600") {
            color = "indigo";
            $("#previ").addClass("text-"+color);
        }

        if (color == "purple-600") {
            color = "purple";
            $("#previ").addClass("text-"+color);
        }

        if (color == "pink-600") {
            color = "pink";
            $("#previ").addClass("text-"+color);
        }




        }
        ); 

        $( "#color" ).on( "change", function() {
            var nombre = $("#name").val();
           var color = $("#color").val();
           $("#previ").removeClass();
           $("#previ").addClass("text-4xl  leading-8 font-bold mt-2");
          
        $("#previ").text(nombre);
  
        $("#previ").addClass("text-"+color); //blanco
        
        if (color == "black-600") {
            color = "black";
            $("#previ").addClass("text-"+color);
        }

        if (color == "red-600") {
            color = "red";
            $("#previ").addClass("text-"+color);
        }

        if (color == "yellow-600") {
            color = "yellow";
            $("#previ").addClass("text-"+color);
        }

        if (color == "green-600") {
            color = "green";
            $("#previ").addClass("text-"+color);
        }

        if (color == "blue-600") {
            color = "blue";
            $("#previ").addClass("text-"+color);
        }

        if (color == "indigo-600") {
            color = "indigo";
            $("#previ").addClass("text-"+color);
        }

        if (color == "purple-600") {
            color = "purple";
            $("#previ").addClass("text-"+color);
        }

        if (color == "pink-600") {
            color = "pink";
            $("#previ").addClass("text-"+color);
        }




        }

        );



 </script>

 
    
@endsection