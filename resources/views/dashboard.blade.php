<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial; padding: 20px; max-width: 1000px; margin: auto; }
        .menu { margin: 20px 0; }
        .menu a { margin-right: 15px; }
        .btn-logout { background: red; color: white; border: none; padding: 8px 16px; cursor: pointer; border-radius: 4px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f2f2f2; }
        .btn { padding: 4px 10px; border-radius: 4px; text-decoration: none; font-size: 14px; }
        .btn-edit { background: yellow; color: black; }
        .btn-delete { background: red; color: white; border: none; padding: 4px 10px; cursor: pointer; border-radius: 4px; }
        .btn-add { background: green; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; }
        .btn-detail { background: blue; color: white; padding: 4px 10px; border-radius: 4px; text-decoration: none; }
    </style>
</head>
<body>
    <h1>📊 Dashboard</h1>
    @if(session('success'))
    <div style="background: green; color: white; padding: 10px; border-radius: 5px; margin: 10px 0;">
        {{ session('success') }}
    </div>
@endif
    <p>Selamat datang, {{ Auth::user()->name }}!</p>

    <div class="menu">
        <a href="/blog">🌐 Lihat Blog Publik</a>
        <a href="/posts/create" class="btn-add">➕ Tambah Postingan</a>
    </div>

    <form class="logout-form" action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button class="btn-logout" type="submit">🚪 Logout</button>
    </form>

    <hr>

    <h2>📝 Daftar Semua Postingan</h2>

    @if($posts->isEmpty())
        <p>Belum ada postingan. <a href="/posts/create">Tambahkan sekarang!</a></p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $index => $post)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->content, 50) }}</td>
                        <td>{{ $post->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="/blog/{{ $post->id }}" class="btn btn-detail">👁️ Detail</a>
                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-edit">✏️ Edit</a>
                            <form action="/posts/{{ $post->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn-delete" onclick="return confirm('Yakin hapus?')">🗑️ Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>