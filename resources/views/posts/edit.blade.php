<!DOCTYPE html>
<html>
<head>
    <title>Edit Postingan</title>
</head>
<body>
    <h1>Edit Postingan</h1>

    <form action="/posts/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Judul:</label><br>
            <input type="text" name="title" value="{{ $post->title }}" size="50" required>
        </div>
        <br>
        <div>
            <label>Konten:</label><br>
            <textarea name="content" rows="10" cols="50" required>{{ $post->content }}</textarea>
        </div>
        <br>
        <button type="submit">Update</button>
        <a href="/dashboard">Batal</a>
    </form>
</body>
</html>