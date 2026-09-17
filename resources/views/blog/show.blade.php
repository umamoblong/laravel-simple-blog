<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
    <style>
        body { font-family: Arial; padding: 20px; max-width: 800px; margin: auto; }
        .menu { margin: 20px 0; }
        .menu a { margin-right: 15px; }
        .content { line-height: 1.8; font-size: 18px; }
    </style>
</head>
<body>
    <div class="menu">
        <a href="/">Home</a>
        <a href="/blog">Blog</a>
        @auth
            <a href="/dashboard">Dashboard</a>
            <a href="/posts">Kelola Postingan</a>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth
    </div>

    <hr>

    <h1>{{ $post->title }}</h1>
    <small>Dipublikasikan: {{ $post->created_at->format('d M Y') }}</small>

    <div class="content">
        <p>{{ $post->content }}</p>
    </div>

    <hr>
    <a href="/dashboard">← Kembali ke Daftar Blog</a>
</body>
</html>