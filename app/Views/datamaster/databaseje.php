<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<style>
    #iframemodal {
        /*Perform to all iframes*/
        width: 100%;
        height: 720px;
    }

    @media only screen and (max-width: 900px) {
        #iframemodal {
            width: 100%;
            height: 100px;
        }
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Database JE</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data</a></li>
                        <li class="breadcrumb-item active">DB JE</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <?php $hitungdatabaseje = count($databaseje); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- <a href="#"><button type="button" class="btn btn-block btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data User</button></a> -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>pertanyaan</th>
                                        <th>jawaban</th>
                                        <th>fraksi</th>
                                        <th>Jenis JE</th>
                                        <th>Klasifikasi</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < $hitungdatabaseje; $i++) : ?>
                                        <tr>
                                            <td><?= $i + 1; ?></td>
                                            <td><?= $databaseje[$i]['pertanyaan']; ?></td>
                                            <td><?= $databaseje[$i]['jawaban']; ?></td>
                                            <td><?= $databaseje[$i]['fraksi']; ?></td>
                                            <td><?= $databaseje[$i]['jenis_je']; ?></td>
                                            <td><?= $databaseje[$i]['klasifikasi']; ?></td>
                                            <td><button onclick="showdetail('<?= $databaseje[$i]['id']; ?>')" type="button" class="btn btn-block btn-info" data-toggle="modal"><i class="fas fa-info-circle"></i> Details</button></td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>pertanyaan</th>
                                        <th>jawaban</th>
                                        <th>fraksi</th>
                                        <th>Jenis JE</th>
                                        <th>Klasifikasi</th>
                                        <th>aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="modal-isian">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Jawaban</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- <div class="modal-body">
                    <iframe src="<?= base_url(); ?>/pdf/tes.pdf" width="770" height="500"></iframe>
                </div> -->

                <div class="modal-body" id="content-data-dbje">
                    <p align="justify" id="p-content-data-dbje"></p>
                    <iframe src="" frameborder="0" id="iframemodal"></iframe>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<!-- /.content-wrapper -->

<!-- Back to top button -->
<button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>
<?= $this->endSection(); ?>

<?= $this->section('javascriptkhusus'); ?>
<script>
    $(function() {
        $("#example1").DataTable({
            // "lengthChange": true,
            "responsive": true,
            "autoWidth": false,
            "ordering": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    const lidatamaster = document.querySelector('.li-datamaster');
    const ahrefdatamaster = document.querySelector('.ahref-datamaster');
    const ahrefdatabaseje = document.querySelector('.ahref-database');

    lidatamaster.classList.add("menu-open");
    ahrefdatamaster.classList.add("active");
    ahrefdatabaseje.classList.add("active");
</script>

<script>
    function showdetail(id) {
        const url = window.location.origin;

        const formData = {
            id_data: id,
        };

        $.ajax({
            type: "POST",
            url: url + "/masterdatabaseje/apigetdatabaseje",
            data: formData,
            dataType: "json",
            headers: {
                "Access-Control-Allow-Origin": "*",
                "Access-Control-Allow-Methods": "POST"
            },
        }).done(function(data) {
            // console.log(data.dataje[0]['id']);
            const parent = document.getElementById('content-data-dbje');
            const childs = parent.childNodes;
            const base_url = window.location.origin;
            // const elemen_iframe = document.createElement("iframe");
            const elemen_iframe = document.getElementById('iframemodal');

            if (data.dataje[0]['status_pdf'] == 0) {
                // console.log(childs[3].attributes.src.nodeValue);
                elemen_iframe.src = '';
                document.getElementById("p-content-data-dbje").innerText = data.dataje[0]['jawaban'];
            } else {
                document.getElementById("p-content-data-dbje").innerText = "";
                elemen_iframe.src = base_url + data.dataje[0]['location_file'];
            }

            // if (data.dataje[0]['status_pdf'] == 0) {
            //     if (childs[3] == undefined) {
            //         document.getElementById("p-content-data-dbje").innerText = data.dataje[0]['jawaban'];
            //     } else {
            //         parent.removeChild(childs[3]);
            //         document.getElementById("p-content-data-dbje").innerText = data.dataje[0]['jawaban'];
            //     }
            // } else {
            //     document.getElementById("p-content-data-dbje").innerText = "";
            //     if (childs[3] == undefined) {
            //         elemen_iframe.src = base_url + data.dataje[0]['location_file'];
            //         elemen_iframe.width = "270";
            //         elemen_iframe.height = "330";
            //         parent.appendChild(elemen_iframe);
            //     } else {
            //         parent.removeChild(childs[3]);
            //         elemen_iframe.src = base_url + data.dataje[0]['location_file'];
            //         elemen_iframe.width = "270";
            //         elemen_iframe.height = "330";
            //         parent.appendChild(elemen_iframe);
            //     }
            // }

        });
        $('#modal-isian').modal('show');
    }
</script>

<script>
    //Get the button
    const mybutton = document.getElementById("btn-back-to-top");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    // When the user clicks on the button, scroll to the top of the document
    mybutton.addEventListener("click", backToTop);

    function backToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<?= $this->endSection(); ?>