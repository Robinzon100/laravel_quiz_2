@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                    this is admin
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                <div class="flex-center position-ref full-height" >
                    <h1>insert a new job</h1>
                
                    <form action="/admin/post/insert" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <label for="title">title</label>
                            <input type="text" name="title" placeholder="title">
                        <br>
                        <br>
                        <label for="description">description</label>
                            <input type="text" name="description" placeholder="description">
                        <br>
                        <br>
                        
                        <button type="submit" value="submit" name="submit">Insert</button>
                    </form>
                </div>



                  
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">description</th>
                        <th scope="col">comment</th>
          
                    </tr>
                </thead>
                <tbody>
                        @foreach($Post as $post)
                    <tr>
                    
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                   
              
                    
               
                
                    
                    <td>
                        <a href="/admin/post/update/{{$post->id}}">Update</a>
                    </td>
                    <td>
                        <form action="/admin/post/postComment" method="post">
                            @csrf
                            <input type="text" name="comment" value={{$post->comment}}>
                            <input type="hidden" value={{$post->id}} name="id">
                            <button >post Comment</button>
                        </form>
        
                     
        
                        
                        </td>


                        <td>
                        <form action="/admin/post/delete" method="post">
                            @csrf
                            <input type="hidden" value={{$post->id}} name="id">
                            <button >Delete</button>
                        </form></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            
                
            </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
