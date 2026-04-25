<?php
require_once 'config/database.php';

$stmt          = $pdo->query('SELECT slug, judul, konten, gambar, alt_gambar FROM artikel ORDER BY urutan ASC');
$daftarArtikel = $stmt->fetchAll();
$tahunSekarang = date('Y');
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Kota Bandung</title>

    <link rel="stylesheet" href="assets/styles/style.css" />
    <script src="assets/scripts/script.js" defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  </head>
  <body>

    <header>

      <div class="jumbotron">
        <h1>Kota Bandung</h1>
        <p>Kota metropolitan terbesar di Provinsi Jawa Barat, sekaligus menjadi ibu kota provinsi tersebut.</p>
      </div>

      <nav>
        <ul>
          <?php foreach ($daftarArtikel as $artikel): ?>
            <li>
              <a href="#<?= htmlspecialchars($artikel['slug']) ?>">
                <?= htmlspecialchars($artikel['judul']) ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>
    </header>

    <main>

      <div id="content">
        <?php if (empty($daftarArtikel)): ?>
          <p>Belum ada konten tersedia.</p>
        <?php else: ?>
          <?php foreach ($daftarArtikel as $artikel): ?>

            <article id="<?= htmlspecialchars($artikel['slug']) ?>" class="card">

              <h2><?= htmlspecialchars($artikel['judul']) ?></h2>

              <?php if (!empty($artikel['gambar'])): ?>
                <img
                  src="<?= htmlspecialchars($artikel['gambar']) ?>"
                  class="featured-image"
                  alt="<?= htmlspecialchars($artikel['alt_gambar'] ?? $artikel['judul']) ?>"
                />
              <?php endif; ?>

              <?= $artikel['konten'] ?>

            </article>

          <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <aside>
        <article class="profile">

          <header>
            <h2>Kota Bandung</h2>
            <p>Kota Kembang Paris Van Java</p>
            <figure>
              <img src="assets/image/bandung-badge.png" alt="Badge Kota Bandung" />
              <figcaption>Badge</figcaption>
            </figure>
          </header>

          <section>
            <h3>Informasi Lainnya</h3>
            <table>
              <tr>
                <th>Negara</th>
                <td>:</td>
                <td>Indonesia</td>
              </tr>
              <tr>
                <th>Hari Jadi</th>
                <td>:</td>
                <td>25 September 1810</td>
              </tr>
              <tr>
                <th>Luas Total</th>
                <td>:</td>
                <td>167.67 km<sup>2</sup></td>
              </tr>
              <tr>
                <th>Bahasa Daerah</th>
                <td>:</td>
                <td>Sunda</td>
              </tr>
            </table>
          </section>

        </article>
      </aside>


    </main>

    <footer>

      <p>Profile Kota Bandung &#169; <?= $tahunSekarang ?> | Muhamad Dikrulloh</p>
    </footer>

  </body>
</html>