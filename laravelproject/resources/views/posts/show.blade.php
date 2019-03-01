@include('inc.header')

<a href="/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<h1>{{$post->title}}</h1>
<p>{{$post->description}}</p>
<p> Written by   {{$post->user->name}}  on {{date('d.m.Y H:i',strtotime($post->created_at))}} </p>

@auth
@if(auth()->user()->id == $post->user->id)

<a href="/posts/<?= $post->id; ?>/edit" class="btn btn-dark"> Edit</a>

<form action="/posts/{{$post->id}}" class="pull-right" method="POST" onclick="return confirm('Are you sure want to delete this?')">
	 <input type="hidden" name="_method" value="DELETE">
  	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	 <input type="hidden" name="id" value="{{$post->id}}">
    <input type="submit" name="delete" class="btn btn-danger" value="Delete">

  </form>
  
@endif
@endauth















