<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Pasien</h1>
  </div>

  <table class="table table-striped">
    <thead>
      <tr class="text-center">
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Topik Konseling</th>
        <th scope="col">Keterangan Permasalahan</th>
        <th scope="col">Jadwal</th>
        <th scope="col">No. Telp</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      $nama = $this->session->userdata('name');
      foreach ($pasien as $data) : ?>
        <tr class="text-center">
          <th scope="row"><?= $i; ?></th>
          <td><?= $data['nama']; ?></td>
          <!-- <?= $topik = $data['topik_konsel']; ?> -->
          <td><?= $dekripsi = dekripsi($topik, $nama); ?></td>
          <!-- <?= $ket = $data['ket']; ?> -->
          <td><?= $dekripsi = dekripsi($ket, $nama); ?></td>
          <td><?= $data['jadwal']; ?></td>
          <td><?= $data['no_telp']; ?></td>
        </tr>
      <?php $i++;
      endforeach; ?>
      <?php
      function dekripsi($text, $key)
      {
        $dekrip1 = _dcaesar($text, $key);
        $dekrip2 = _dvigenere($dekrip1, $key);
        return $dekrip2;
      }

      function _dcaesar($chipertext, $kunci)
      {
        $keylength  = strlen($kunci);
        $key        = 26 - $keylength;

        $plain = "";
        $plaintextArr = str_split($chipertext);
        foreach ($plaintextArr as $ch)
          $plain .= _chiper($ch, $key);

        return $plain;
      }

      function _chiper($ch, $kunci)
      {
        if (!ctype_alpha($ch)) {
          return $ch;
        }

        $offset = ord(ctype_alpha($ch) ? 'A' : 'a');
        return chr(fmod(((ord($ch) + $kunci) - $offset), 26) + $offset);
      }

      function _dvigenere($text, $key)
      {
        $ki = 0;
        $kl = strlen($key);
        $length = strlen($text);

        for ($i = 0; $i < $length; $i++) {
          if (ctype_alpha($text[$i])) {
            if (ctype_upper($text[$i])) {
              $x = ((ord($text[$i]) - ord("A")) - (ord($key[$ki]) - ord("A")) % 26);
              if ($x < 0)
                $x += 26;
              $x = $x + ord("A");
              $text[$i] = chr($x);
            } else {
              $x = ((ord($text[$i]) - ord("a")) - (ord($key[$ki]) - ord("a")) % 26);
              if ($x < 0)
                $x += 26;
              $x = $x + ord("a");
              $text[$i] = chr($x);
            }
            $ki++;
            if ($ki >= $kl) {
              $ki = 0;
            }
          }
        }
        return $text;
      }
      ?>
    </tbody>
  </table>

</main>