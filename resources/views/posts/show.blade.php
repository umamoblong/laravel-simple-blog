<!DOCTYPE html>
<html>
<head>
    <title>Detail Postingan</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <a href="/posts">Kembali ke Daftar</a>
    <a href="/posts/{{ $post->id }}/edit">Edit</a>
    <form action="/posts/{{ $post->id }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
</form>
</body>
</html>