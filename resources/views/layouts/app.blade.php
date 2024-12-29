<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
</head>
<body>
    <header>
        <h1>Selamat Datang di Dashboard, Kuliah</h1>
    </header>

    <main>
        @yield('content')  <!-- Content from the individual views will go here -->
    </main>

    <footer>
        <p>Laravel Application Footer</p>
    </footer>
</body>
</html>
