<div class="form-group">
    {!! Form::label('name','Nombre:')  !!}
    {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Ingrese el nombre del post'])  !!}

    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('color','Color del titulo:') !!}
    {!! Form::select('color',$colors,null,['class' => 'form-control']) !!}
    @error('color')
    <span class="text-danger">{{$message}}</span>
 @enderror
  </div>
<div class="form-group">
 {!! Form::label('slug','Slug:')  !!}
 {!! Form::text('slug',null,['class' => 'form-control','placeholder' => 'Slug del post','readonly'])  !!}
 @error('slug')
 <small class="text-danger">{{$message}}</small>
@enderror
</div>
<div class="form-group">
 {!! Form::label('category_id','Categoria')  !!}
 {!! Form::select('category_id',$categories,null,['class' => 'form-control'])  !!}
 @error('category_id')
 <small class="text-danger">{{$message}}</small>
@enderror
</div>
<div class="form-group">
     <p class="font-weight-bold">Etiquetas</p>
     @foreach ($tags as $tag)
         <label class="mr-2"> 
             {!! Form::checkbox('tags[]',$tag->id)  !!}
             {{$tag->name}}
         </label>
     @endforeach

     
     @error('tags')
     <br>
     <small class="text-danger">{{$message}}</small>
 @enderror
</div>
<div class="form-gropu">
    <p class="font-weight-bold">Estado</p>
    <label >
        {!! Form::radio('status',1,true)  !!}
        Borrador
    </label>
    <label >
     {!! Form::radio('status',2)  !!}
     Publicado
 </label>
 
 @error('status')
 <br>
 <small class="text-danger">{{$message}}</small>
@enderror
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($post->image)
            <img id="picture" src="{{Storage::url($post->image->url)}}">
            <h1 id="previ" style="position: absolute; top: 50%; left: 10%;" class="text-4xl  leading-8 font-bold mt-2"></h1>
            @else
            <img id="picture" src="https://static1.educaedu.com.mx/adjuntos/9/00/53/universidad-univer-005399_large.jpg" alt="">
            <h1 id="previ" style="position: absolute; top: 50%; left: 10%;" class="text-4xl  leading-8 font-bold mt-2"></h1>
            @endisset

           
         
     </div>
     </div>
    <div class="col">
        <div class="form-group">
         {!! Form::label('file','Imagen que se mostrara:')  !!}
         {!! Form::file('file',['class' => 'form-control-file','accept' => 'image/*'])  !!}
        </div>
        <p>Esta imagen se mostrara como fondo de tu publicacion</p>
        @error('file')
 <br>
 <small class="text-danger">{{$message}}</small>
@enderror
</div>

</div>


</div>

<div class="form-group">
 {!! Form::label('extract','Extracto:')  !!}
 {!! Form::textarea('extract',null,['class' => 'form-control'])  !!}
 @error('extract')
 <small class="text-danger">{{$message}}</small>
@enderror
</div>
<div class="form-group">
 {!! Form::label('body','Cuerpo del post:')  !!}
 {!! Form::textarea('body',null,['class' => 'form-control'])  !!}
 @error('body')
 <small class="text-danger">{{$message}}</small>
@enderror


</div>