@extends('posts.postmaster')

@section('content')
<div class="card">
    @if (session('message'))
        <div id="flash-message" class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <h2>Blog: gewijzigd artikel publiseren:</h2>
    <p>Titel Blog, Text Blog en Categorie zijn verplicht in te vullen.<br />
    Subtitel en Subtext zijn optioneel.<br />
    Selecteer vervolgens eerst een foto en druk daarna op 'Upload naar Website'.<br />
    P.S. Je kunt ook geen foto selecteren!</p>
    <p>De text in de blog kun je opmaken met <u>HTML!</u><br />
    Voor een goede snelle cursus ga naar: <a href="https://www.w3schools.com/html/">w3schools.com</a></p><br />
 
    <form method="POST" action="{{ action('PostsController@update', [ 'id' => $post->id ]) }}" name="form1" class="form1" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="inform">
            <span class='namefield'>Titel Blog</span>
            <input type='text' size='43' maxlength='50' name='title' value='{{ $post->title }}' autocomplete='off' /><br />
            <div id='fieldspace'></div>
            <span class='namefield'>Text Blog:</span><br />
            <textarea class="form-control" rows="10" cols="75" id="textarea" name="body" onfocus="magic();">{{ $post->body }}</textarea><br />
            <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
            <script>
                CKEDITOR.replace( 'textarea', {
                    language: 'nl',
                    uiColor: '#dddddd'
                });
            </script>
            <div id='fieldspace'></div>
            <span class='namefield'>Categorie</span>
            <select name='cat[]' style='width:150px' multiple>
            @foreach($tags as $tag)
                <option value='{{ $tag->id }}' {{($post->tags->contains($tag->id)) ? "selected" : ""}}>{{ $tag->name }}</option>";
            @endforeach 
            </select><br />
            <button type="button" class="button" id="button3">nieuwe categorie</button>
            <div id='itext'><br />
            <input type='text' size='43' maxlength='50' name='text1' value=''/><br />
            </div><br /><br />
            <div id='fieldspace'></div>
            <span class='namefield'>Subtitel</span>
            <input type='text' size='43' maxlength='50' name='subtitle' value='{{ $post->subtitle }}' autocomplete='off' /><br />
            <div id='fieldspace'></div>
            <label for="comment">Subtext</label><br />
            <textarea class="form-control" rows="2" cols="75" id="comment2" name="subbody">{{ $post->subbody }}</textarea><br /><br />
            <script>
                CKEDITOR.replace( 'comment2', {
                    language: 'nl',
                    uiColor: '#dddddd'
                });
            </script>
            <div id='fieldspace'></div>
            <span class='namefield'>Selecteer een foto:</span>
            <input type="file" name="cover_image" id="cover_image" /><br /><br />
            <button type="submit" name="submit2" id="button2">Publiseren</button>
            <button type="button" name="back" id="button2" onclick="history.back()">Terug naar Blog</button>
            @include('layouts.error')
        </div>
    </form>
</div>
<script src="{{ asset('js/functions.js') }}"></script>
<script>
$('#itext').hide();
$("#button3").on("click", function() {
  $('#itext').toggle(2000);
});
</script>
@endsection