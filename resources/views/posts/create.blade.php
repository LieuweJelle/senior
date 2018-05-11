@extends('posts.postmaster')

@section('content')
<div class="card">
    <h2>Blog: nieuw artikel publiseren:</h2>
    <p>Titel Blog, Text Blog en Categorie zijn verplicht in te vullen.<br />
    Subtitel en Subtext zijn optioneel.<br />
    Selecteer vervolgens eerst een foto en druk daarna op 'Upload naar Website'.<br />
    P.S. Je kunt ook geen foto selecteren!</p>
    <p>De text in de blog kun je opmaken met <u>HTML!</u><br />
    Voor een goede snelle cursus ga naar: <a href="https://www.w3schools.com/html/">w3schools.com</a></p>

    <form method="POST" action="/posts" enctype="multipart/form-data">
        @csrf
        <div class="inform">
            <span class='namefield'>Titel Blog</span>
            <input type='text' size='43' maxlength='50' name='title' value='' autocomplete='off' /><br />
            <div id='fieldspace'></div>
            <span class='namefield'>Text Blog:</span><br />
            <textarea class="form-control" rows="10" cols="75" id="textarea" name="body" onfocus="magic();"></textarea><br />
            <div id='fieldspace'></div>
            <span class='namefield'>Categorie</span>
            <select name='cat[]' style='width:150px' multiple>
            @foreach($tags as $tag)
                <option value='{{ $tag->id }}'>{{ $tag->name }}</option>";
            @endforeach 
            </select><br />
            <button type="button" class="button" id="button3">nieuwe categorie</button>
            <div id='itext'><br />
            <input type='text' size='43' maxlength='50' name='text1' value=''/><br />
            </div><br /><br />
            <div id='fieldspace'></div>
            <span class='namefield'>Subtitel</span>
            <input type='text' size='43' maxlength='50' name='subtitle' value='' autocomplete='off' /><br />
            <div id='fieldspace'></div>
            <label for="comment">Subtext</label><br />
            <textarea class="form-control" rows="2" cols="75" id="comment2" name="subbody"></textarea><br /><br />
            <div id='fieldspace'></div>
            <span class='namefield'>Selecteer een foto:</span>
            <input type="file" name="fileToUpload" id="fileToUpload" /><br /><br />
            <button type="submit" name="submit2" id="button2">Publiseren</button>
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