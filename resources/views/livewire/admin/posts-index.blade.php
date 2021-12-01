<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingresa el nombre de un post">
    </div>


    @if ($posts->count())
            
        

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th colspan="2"></th>
                        </tr>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->name}}</td>
                                    <td with="10px"><a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit',$post)}}">Editar</a></td>
                                    <td with="10px"> 
                                        <form method="POST" action="{{route('admin.posts.destroy',$post)}}">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm ">Borrar</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </thead>
                </table>
            </div>
        <div class="card-footer">
            {{$posts->links()}}
        </div>
        @else
        <div class="card-body">
            <strong>No hay ningun registro...</strong>
        </div>
     @endif
</div>
