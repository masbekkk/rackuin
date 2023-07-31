<!DOCTYPE html>
<html>
<head>
    <title>Filter Kategori</title>
    <style>
        /* CSS untuk tampilan filter */
        .filter-buttons {
            margin-bottom: 20px;
        }
        .filter-buttons button {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="filter-buttons">
        <button data-category="semua">Semua</button>
        <button data-category="kategori1">Kategori 1</button>
        <button data-category="kategori2">Kategori 2</button>
        <button data-category="kategori3">Kategori 3</button>
    </div>

    <!-- Konten yang akan difilter -->
    <div class="konten" data-category="semua">Konten untuk Semua</div>
    <div class="konten" data-category="kategori1">Konten Kategori 1</div>
    <div class="konten" data-category="kategori2">Konten Kategori 2</div>
    <div class="konten" data-category="kategori3">Konten Kategori 3</div>

    <script>
        // JavaScript untuk menangani filter
        const filterButtons = document.querySelectorAll('.filter-buttons button');
        const kontenItems = document.querySelectorAll('.konten');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const category = button.getAttribute('data-category');

                kontenItems.forEach(item => {
                    if (category === 'semua' || item.getAttribute('data-category') === category) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>