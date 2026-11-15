<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Produk</title>
    <link rel="stylesheet" href="<?= esc($config->baseURL . 'public/vendors/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= esc($config->baseURL . 'public/vendors/fontawesome/css/all.css') ?>">
    <link rel="stylesheet" href="<?= esc($config->baseURL . 'public/themes/modern/css/catalog.css') ?>">
</head>
<body>
    <header class="catalog-navbar">
        <div class="catalog-navbar-inner">
            <a class="catalog-brand" href="<?= esc($config->baseURL) ?>">Depot Air Minum & Gas 3Kg</a>
            <nav aria-label="Navigasi utama">
                <!-- <a class="nav-link active" href="<?= esc($config->baseURL) ?>">Katalog</a> -->
                
                <?php if (session()->get('logged_in')) { ?>
                    <a class="nav-login active" href="<?= esc($config->baseURL . 'pos-kasir') ?>">Point of Sales</a>
                <?php }  else {?>
                
                <a class="nav-login" href="<?= esc($config->baseURL . 'login') ?>">
                    <i class="fas fa-user me-2" aria-hidden="true"></i>Login
                </a>
                <?php } ?>
            </nav>
        </div>
    </header>

    <main class="catalog-main">
        <section class="catalog-intro">
            <p class="eyebrow">PILIHAN PRODUK</p>
            <h1>Katalog Produk</h1>
            <p>Temukan produk yang Anda butuhkan.</p>
        </section>

        <form class="catalog-filters" method="get" action="<?= esc($config->baseURL) ?>">
            <label class="search-field">
                <i class="fas fa-search" aria-hidden="true"></i>
                <span class="visually-hidden">Cari produk</span>
                <input type="search" name="q" value="<?= esc($search) ?>" placeholder="Cari nama, kode, atau barcode produk">
            </label>
            <label class="category-field">
                <span class="visually-hidden">Kategori produk</span>
                <select name="category" class="form-select">
                    <option value="0">Semua kategori</option>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?= esc($category['id_barang_kategori']) ?>" <?= $categoryId === (int) $category['id_barang_kategori'] ? 'selected' : '' ?>>
                            <?= esc($category['nama_kategori']) ?>
                        </option>
                    <?php } ?>
                </select>
            </label>
            <button class="filter-button" type="submit">Cari Produk</button>
        </form>

        <div class="catalog-summary" aria-live="polite">
            <?= number_format($total, 0, ',', '.') ?> produk ditemukan
        </div>

        <?php if ($products) { ?>
            <section class="product-grid" aria-label="Daftar produk">
                <?php foreach ($products as $product) {
                    $imagePath = !empty($product['nama_file'])
                        ? ROOTPATH . 'public/files/uploads/' . basename($product['nama_file'])
                        : '';
                    $imageUrl = $imagePath !== '' && is_file($imagePath)
                        ? $config->baseURL . 'public/files/uploads/' . rawurlencode(basename($product['nama_file']))
                        : $config->baseURL . 'public/images/noimage.png';
                ?>
                    <article class="product-card">
                        <div class="product-image">
                            <img src="<?= esc($imageUrl) ?>" alt="<?= esc($product['nama_barang']) ?>" loading="lazy">
                        </div>
                        <div class="product-info">
                            <?php if (!empty($product['nama_kategori'])) { ?>
                                <span class="product-category"><?= esc($product['nama_kategori']) ?></span>
                            <?php } ?>
                            <h2><?= esc($product['nama_barang']) ?></h2>
                            <?php if (!empty($product['kode_barang'])) { ?>
                                <p class="product-code">Kode: <?= esc($product['kode_barang']) ?></p>
                            <?php } ?>
                            <p class="product-price">
                                <?= $product['harga'] !== null ? 'Rp ' . number_format((float) $product['harga'], 0, ',', '.') : 'Hubungi toko' ?>
                            </p>
                        </div>
                    </article>
                <?php } ?>
            </section>

            <?php if ($pageCount > 1) {
                $query = array_filter([
                    'q' => $search,
                    'category' => $categoryId ?: null,
                ]);
                $pageUrl = static function (int $number) use ($config, $query): string {
                    return $config->baseURL . '?' . http_build_query($query + ['page' => $number]);
                };
                $firstPage = max(1, min($page - 2, $pageCount - 4));
                $lastPage = min($pageCount, $firstPage + 4);
            ?>
                <nav class="catalog-pagination" aria-label="Navigasi halaman katalog">
                    <?php if ($page > 1) { ?>
                        <a class="page-link" href="<?= esc($pageUrl($page - 1)) ?>" aria-label="Halaman sebelumnya">&laquo; Sebelumnya</a>
                    <?php } ?>
                    <?php for ($number = $firstPage; $number <= $lastPage; $number++) { ?>
                        <a class="page-link <?= $number === $page ? 'current' : '' ?>"
                           href="<?= esc($pageUrl($number)) ?>"
                           <?= $number === $page ? 'aria-current="page"' : '' ?>><?= $number ?></a>
                    <?php } ?>
                    <?php if ($page < $pageCount) { ?>
                        <a class="page-link" href="<?= esc($pageUrl($page + 1)) ?>" aria-label="Halaman berikutnya">Berikutnya &raquo;</a>
                    <?php } ?>
                </nav>
            <?php } ?>
        <?php } else { ?>
            <div class="empty-catalog">
                <i class="fas fa-box-open" aria-hidden="true"></i>
                <h2>Produk tidak ditemukan</h2>
                <p>Coba ubah kata kunci atau pilih kategori lain.</p>
            </div>
        <?php } ?>
    </main>

    <footer class="catalog-footer">
        <span>&copy; <?= date('Y') ?> kasirPRO</span>
        <a href="https://cepatonline.com" target="_blank" rel="noopener noreferrer">Cepat Online</a>
    </footer>
</body>
</html>
