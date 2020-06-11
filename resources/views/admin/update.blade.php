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
                <h1>update post</h1>
            
                <form action="/admin/post/updatePost" method="post" enctype="multipart/form-data">
                    @csrf
                    
                        <input value="{{ $post->id }}" type="hidden" name="id" placeholder="title">
                    <label for="title">title</label>
                        <input value="{{ $post->title }}" type="text" name="title" placeholder="title">
                    <br>
                    <br>
                    <label for="description">description</label>
                        <input value="{{ $post->description }}" type="text" name="description" placeholder="description">
          
               
                    <br>
                     
                    <button type="submit" value="submit" name="submit">update</button>
                </form>
            </div>


 
            
                
            </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
