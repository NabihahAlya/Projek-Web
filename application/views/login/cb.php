<main class="content mt-5">
    <div class="container-fluid">
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="mb-0">DATA KRITIK DAN SARAN</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kritik dan Saran</th>
                                <th scope="col">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  $no = 1;  foreach ($kritik_list as $k) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $k->nama_pengirim; ?></td>
                                <td><?php echo $k->kritik_saran; ?></td>
                                <td><?php echo $k->tanggal_kirim; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
