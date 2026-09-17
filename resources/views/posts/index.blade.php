<!DOCTYPE html>
<html>
<head>
    <title>Daftar Postingan</title>
</head>
<body>
    <h1>Daftar Postingan Blog</h1>
    <a href="/posts/create">Tambah Postingan Baru</a>
    
    <ul>
        @foreach($posts as $post)
            <li>
                <h3>{{ $post->title }}</h3>
                <p>{{ substr($post->content, 0, 100) }}...</p>
                <a href="/posts/{{ $post->id }}">Baca Selengkapnya</a>
                <a href="/posts/{{ $post->id }}/edit">Edit</a>
                <form action="/posts/{{ $post->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
            </form>
            </li>
        @endforeach
    </ul>
</body>
</html>