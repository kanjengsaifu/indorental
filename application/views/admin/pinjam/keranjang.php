        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
             <thead>
            <tr>
                <td>Nama Barang</td>
                <td>Jumlah</td>
                <td>Harga</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($tmp as $tmp):?>
        <tr>
            <td><?php echo $tmp->id_barang;?></td>
            <td><?php echo $tmp->jumlah;?></td>
            <td><?php echo $tmp->harga;?></td>
            <td><a href="#" class="hapus" kode="<?php echo $tmp->id_barang;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
        <?php endforeach;?>
        <tr>
            <td colspan="2">Total Buku</td>
            <td colspan="2"><input type="text" id="jumlahTmp" readonly="readonly" value="<?php echo $jumlahTmp;?>" class="form-control"></td>
        </tr>
    </table>