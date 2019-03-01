@include('inc.header')
  <form class="form-inline active-cyan-4 float-right " >
        <input type="text" name="search" class="form-control form-control-lg-2 mr-auto " placeholder="Search. . . ">
       
    <button type="submit"><i class="fa fa-search"></i></button>
 </form>


<a href="/" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
 

<div class="row mb-3">
<div class="col-md-6">
	 <h1>Posts</h1>
 </div>
		<div class="col-md-6">
      @auth
      <a href="/posts/create" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add Post
      </a>
      @endauth
    </div>
  </div>
   @if ($posts)
   @foreach($posts as $post)

     <div class="card card-body mb-3">
      <h4 class="card-title"><?= $post->title; ?></h4>
      <div class="bg-light p-2 mb-3">
       <p> Written by   {{$post->user->name}}  on {{date('d.m.Y H:i',strtotime($post->created_at))}} </p>
      </div>
      <p class="card-text"><?= $post->description; ?></p>
       <a href="/posts/<?=$post->id; ?> "class="btn btn-dark" >More</a>
    </div>
  @endforeach
  @endif