            <!-- DATA PROGRAM STUDI -->
            <div id="studi" class="col s12">
                <!-- PENCARIAN -->
                <section class="search" id="search">
                    <div class="row">
                        <h3 class="center light grey-text text-darken-3">DATA PROGRAM STUDI CALON MAHASISWA</h3>
                        <div class="col m12 light">
                            <h5>Pencarian:</h5>
                            <form>
                                <div class="row">
                                    <div class="input-field col m5 s12">
                                        <i class="material-icons prefix">search</i>
                                        <input id="icon_prefix" type="text" class="validate">
                                        <label for="icon_prefix">Kata Kunci</label>
                                        <span class="helper-text black-text" data-error="wrong" data-success="right">Kata
                                            Kunci:
                                            NIS, Nama Lengkap, Jurusan, Jenjang, Falkutas, Kelas</span>
                                    </div>
                                    <div class="input-field col s6">
                                        <button class="btn waves-effect waves-light" type="submit"
                                            name="action">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- END PENCARIAN -->

                <!-- TABEL -->
                <div class="row">
                    <div class="col m12 s12">
                        <table class="highlight responsive-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th>Jenjang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php foreach($data_prodi as $prodi) : ?>
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td><?php echo $prodi["nis"]; ?></td>
                                    <td><?php echo $prodi["nama_lengkap"]; ?></td>
                                    <td><?php echo $prodi["jurusan"]; ?></td>
                                    <td><?php echo $prodi["kelas"]; ?></td>
                                    <td><?php echo $prodi["jenjang"]; ?></td>
                                    <td>
                                    <td>
                                        <a class="waves-effect waves-light btn red" href="<?php echo $prodi["id"]; ?>"><i
                                                class="material-icons left">delete</i>Hapus</a>
                                    </td>
                                </tr>
                                <?php $nomor++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END TABEL -->

                <!-- PAGINATION -->
                <div class="row">
                    <div class="col md12 s12">
                        <ul class="pagination">
                            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                            <li class="active"><a href="#!">1</a></li>
                            <li class="waves-effect"><a href="#!">2</a></li>
                            <li class="waves-effect"><a href="#!">3</a></li>
                            <li class="waves-effect"><a href="#!">4</a></li>
                            <li class="waves-effect"><a href="#!">5</a></li>
                            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- END PAGINATION -->
                
            </div>
            <!-- END PROGRAM STUDI -->
            
        </div>
    </div>
</main>



