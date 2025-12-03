<?php require __DIR__ . '/../Layout/Header.php'; ?>
<div style="margin-bottom: 15px;">
    <button 
        onclick="history.back()" 
        class="btn btn-sm btn-outline-secondary" 
        title="Kembali ke halaman sebelumnya">
        
        &larr; Kembali 
        
        </button>
</div>
<h4>Rekap Tamu per Kegiatan</h4>
<table class="table table-hover">
  <thead><tr><th>#</th><th>Nama Kegiatan</th><th>Total Tamu</th></tr></thead>
  <tbody>
    <?php foreach($rekap as $i => $r): ?>
      <tr>
        <td><?= $i+1 ?></td>
        <td><?= htmlspecialchars($r['nama_kegiatan']) ?></td>
        <td><?= htmlspecialchars($r['total_tamu']) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php require __DIR__ . '/../Layout/Footer.php'; ?>
