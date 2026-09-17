<!DOCTYPE html>
<html>
<head>
    <title>Tambah Postingan</title>
</head>
<body>
    <h1>Tambah Postingan Baru</h1>

    <form action="/posts" method="POST">
        @csrf
        <div>
            <label>Judul:</label><br>
            <input type="text" name="title" size="50" required>
        </div>
        <br>
        <div>
            <label>Konten:</label><br>
            <textarea name="content" rows="10" cols="50" required></textarea>
        </div>
        <br>
        <button type="submit">Simpan</button>
        <a href="/dashboard">Batal</a>
    </form>
</body>
</html>