<?php
    require '../../../connection/database_connect.php';
    session_start();

    $id = $_SESSION['id'];
?>
<table class="table table-sm table-bordered feature">
    <thead>
        <tr>
            <th>Jenis</th>
            <th>Deskripsi</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $v_c = mysqli_query($con, "SELECT * FROM version_control WHERE v_id='$id'");
            while($data = mysqli_fetch_object($v_c))
            {
                ?>
                    <tr>
                        <td><?= $data->jenis; ?></td>
                        <td><?= $data->deskripsi; ?></td>
                        <td class="text-center"><button type="button" data-id="<?= $data->id; ?>" class="btn btn-sm btn-danger delete"><em class="fas fa-trash"></em></button></td>
                    </tr>
                <?php
            }
        ?>
    </tbody>
</table>