@include('inc.header')

<a href="/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-5">
<h2>Edit Post</h2>
    <p>Create a post with this form</p>
    <form action="/posts" method="POST">
    	@csrf
   		 @method('PUT')
      	 <input type="hidden" name="id" value="<?= $post->id?>" >
        <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" class="form-control form-control-lg " value="<?= $post->title?>" ><br>
        </div>
            <div class="form-group">
        <label for="description">Text: </label>
        <textarea name="description" class="form-control form-control-lg " ><?= $post->description?></textarea><br>
            </div>
      
     
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>

@include('inc.errors')