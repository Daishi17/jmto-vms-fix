<main class="container">
    <style>
        .btn-grad5 {
            width: 100%;
            background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%);
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;

            border-radius: 10px;
        }

        .btn-grad5:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            box-shadow: 0 0 40px #1CB5E0;
            text-decoration: none;
        }

        .btn-grad6 {
            width: 100%;
            background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%);
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;

            border-radius: 10px;
        }

        .btn-grad6:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            box-shadow: 0 0 40px #1CB5E0;
            text-decoration: none;
        }

        .btn-grad15 {
            background-image: linear-gradient(to right, #fc00ff 0%, #00dbde 51%, #fc00ff 100%)
        }

        .btn-grad15 {
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;

        }

        .btn-grad15:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
            box-shadow: 0 0 40px #fc00ff;
        }


        .user_img_msg {
            height: 100% !important;
            width: 100% !important;
            /* border: 1.5px solid #f5f6fa; */
        }

        #textnya {
            font-size: large;
            font: message-box;
            font-weight: bolder;
        }

        .profileku {
            width: 100% !important;
            height: 65%;
            border-radius: 10px;
            background: rgb(7, 6, 18);
            background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
        }

        .user_img_ku {
            height: 40px;
            width: 40px;
            border: 1.5px solid #f5f6fa;
        }


        .chat {
            margin-top: auto;
            margin-bottom: auto;
        }

        .card_chat {

            height: 500px;
            border-radius: 15px !important;
            background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%);
        }

        .card_chat:hover {
            box-shadow: 0 0 40px #1CB5E0;
        }

        .contacts_body {
            padding: 0.75rem 0 !important;
            overflow-y: auto;
            white-space: nowrap;
        }

        .msg_card_body {
            overflow-y: auto;
        }

        .card-header_chat {
            border-radius: 15px 15px 0 0 !important;
            border-bottom: 0 !important;
        }

        .card-footer_chat {
            border-radius: 0 0 15px 15px !important;
            border-top: 0 !important;
        }

        .container_chat {
            align-content: center;
        }

        .search {
            border-radius: 15px 0 0 15px !important;
            background: rgb(209, 226, 227);
            background: linear-gradient(90deg, rgba(209, 226, 227, 1) 5%, rgba(255, 209, 0, 0.30015756302521013) 86%);
            border: 0 !important;
            color: black !important;
        }

        .search:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .type_msg {
            background: rgb(7, 6, 18);
            background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
            border: 0 !important;
            color: white !important;
            height: 50px !important;
            overflow-y: auto;
        }

        .type_msg:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .attach_btn {
            border-radius: 15px 0 0 15px !important;
            background: rgb(7, 6, 18);
            background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
            border: 0 !important;
            color: white !important;
            cursor: pointer;
        }

        .send_btn {
            border-radius: 0 15px 15px 0 !important;
            background: rgb(7, 6, 18);
            background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
            border: 0 !important;
            color: white !important;
            cursor: pointer;
            height: 50px !important;
        }

        .search_btn {
            border-radius: 0 15px 15px 0 !important;
            background: rgb(7, 6, 18);
            background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
            border: 0 !important;
            color: white !important;
            cursor: pointer;
        }

        .contacts {
            list-style: none;
            padding: 0;
        }

        .contacts li {
            width: 100% !important;
            padding: 5px 10px;
            margin-bottom: 15px !important;
        }

        .active-angga {
            background: rgb(7, 6, 18);
            background: linear-gradient(90deg, rgba(30, 90, 40, 1) 0%, rgba(42, 41, 100, 1) 100%);
        }

        .active-anggi {
            background-color: #c23616 !important;
        }

        .user_img {
            height: 70px;
            width: 70px;
            border: 1.5px solid #f5f6fa;

        }

        .user_img_msg {
            height: 40px;
            width: 40px;
            border: 1.5px solid #f5f6fa;

        }

        .img_cont {
            position: relative;
            height: 70px;
            width: 70px;
        }

        .img_cont_msg {
            height: 40px;
            width: 40px;
        }

        .online_icon {
            position: absolute;
            height: 15px;
            width: 15px;
            background-color: #4cd137;
            border-radius: 50%;
            bottom: 0.2em;
            right: 0.4em;
            border: 1.5px solid white;
        }

        .offline {
            background-color: #c23616 !important;
        }

        .user_info {
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 15px;
        }

        .user_info_ku {
            /* margin-top: auto; */
            margin-bottom: auto;
            margin-left: 15px;
        }

        .user_info_ku span {
            font-size: 20px;
            color: white;
        }


        .user_info span {
            font-size: 20px;
            color: white;
        }

        .user_info_ku p {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.6);
        }

        .user_info p {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.6);
        }

        .video_cam {
            margin-left: 50px;
            margin-top: 5px;
        }

        .video_cam span {
            color: white;
            font-size: 20px;
            cursor: pointer;
            margin-right: 20px;
        }

        .msg_cotainer {
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 10px;
            border-radius: 25px;
            background-color: #82ccdd;
            padding: 10px;
            position: relative;
            width: 500px;
        }

        .msg_cotainer_send {
            width: 500px;
            margin-top: auto;
            margin-bottom: auto;
            margin-right: 10px;
            border-radius: 25px;
            background-color: #78e08f;
            padding: 10px;
            position: relative;
        }

        .msg_cotainer_send2 {
            margin-top: auto;
            margin-bottom: auto;
            margin-right: 10px;
            border-radius: 25px;
            background-color: #BDB76B;
            padding: 10px;
            position: relative;
            width: 500px;
        }

        .msg_time {
            position: absolute;
            left: 0;
            bottom: -17px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 10px;
        }

        .msg_time_send {
            position: absolute;
            right: 0;
            bottom: -15px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 10px;
        }

        .msg_head {
            position: relative;
        }

        #action_menu_btn {
            position: absolute;
            right: 10px;
            top: 10px;
            color: white;
            cursor: pointer;
            font-size: 20px;
        }

        .action_menu {
            z-index: 1;
            position: absolute;
            padding: 15px 0;
            background: white;
            color: white;
            border-radius: 15px;
            top: 30px;
            right: 15px;
            display: none;
        }

        .action_menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .action_menu ul li {
            width: 100%;
            padding: 10px 15px;
            margin-bottom: 5px;
        }

        .action_menu ul li i {
            padding-right: 10px;

        }

        .action_menu ul li:hover {
            cursor: pointer;
            background: white;
        }

        @media(max-width: 576px) {
            .contacts_card {
                margin-bottom: 15px !important;
            }
        }
    </style>
    <div class="row">
        <div class="col">
            <div class="card border-dark mt-3">
                <div class="card-header border-dark bg-white text-black">
                    <ul class="nav nav-tabs">
                        <!-- <li class="nav-item">
                            <a class="nav-link " aria-current="page"><i class="fa fa-list-alt" aria-hidden="true"> </i> Menu Tender</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/informasi_tender/' . $rup['id_url_rup']) ?>"><i class="fa fa-columns" aria-hidden="true"></i> Informasi Pengadaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/aanwijzing/' . $rup['id_url_rup']) ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing (PQ)</a>
                        </li>
                        <?php if ($rup['id_jadwal_tender'] == 1) { ?>
                           
                        <?php  } else { ?>
                            <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/aanwijzing_penawaran/' . $rup['id_url_rup']) ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing (Penawaran)</a>
                        </li>
                        <?php }
                        ?>

                        <?php if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <?php $date2 = $jadwal_aanwijzing_pq['waktu_selesai'];
                            if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>
                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai']))  == date('Y-m-d H:i')) { ?>
                            <?php    } else { ?>

                            <?php    } ?>
                        <?php } else { ?>
                            <?php
                            if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai'])) == date('Y-m-d H:i')) { ?>

                            <?php    } else { ?>

                            <?php    } ?>
                        <?php } ?>

                        <?php if ($sts_nego == 'buka_negosiasi') { ?>
                            <?php if (date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                <?php $date2 = $jadwal_penetapan_pemenang['waktu_selesai'];
                                if (date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>
                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_mulai']))  == date('Y-m-d H:i')) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/negosiasi/' . $rup['id_url_rup']) ?>"><i class="fa fa-tags" aria-hidden="true"></i> Negosiasi</a>
                                    </li>
                                <?php    } else { ?>
                                    <!-- waktu Telah Selesai -->
                                <?php    } ?>
                            <?php } else { ?>
                                <?php
                                if (date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_penetapan_pemenang['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/negosiasi/' . $rup['id_url_rup']) ?>"><i class="fa fa-tags" aria-hidden="true"></i> Negosiasi</a>
                                    </li>
                                <?php    } else { ?>

                                <?php    } ?>
                            <?php } ?>
                        <?php } else { ?>

                        <?php   }
                        ?>

                        <?php if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_kualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <?php $date2 = $jadwal_masa_sanggah_kualifikasi['waktu_selesai'];
                            if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_kualifikasi['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>
                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_kualifikasi['waktu_mulai']))  == date('Y-m-d H:i')) { ?>
                                <li class="nav-item">
                                    <a class="nav-link bg-primary text-white " style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_prakualifikasi/'  . $rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Prakualifikasi</a>
                                </li>
                            <?php    } else { ?>
                                <!-- waktu Telah Selesai -->
                            <?php    } ?>
                        <?php } else { ?>
                            <?php
                            if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_kualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_kualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                <li class="nav-item">
                                    <a class="nav-link bg-primary text-white " style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_prakualifikasi/'  . $rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Prakualifikasi</a>
                                </li>
                            <?php    } else { ?>
                                <!-- Waktu Telah Berakhir -->
                            <?php    } ?>
                        <?php } ?>
                        <?php if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                            <?php $date2 = $jadwal_masa_sanggah_akhir['waktu_selesai'];
                            if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>
                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai']))  == date('Y-m-d H:i')) { ?>
                                <li class="nav-item">
                                    <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_akhir/'  . $rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan </a>
                                </li>
                            <?php    } else { ?>
                                <!-- waktu Telah Selesai -->
                            <?php    } ?>
                        <?php } else { ?>
                            <?php
                            if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_masa_sanggah_akhir['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                <li class="nav-item">
                                    <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_akhir/'  . $rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan </a>
                                </li>
                            <?php    } else { ?>
                                <!-- Waktu Telah Berakhir -->
                            <?php    } ?>
                        <?php } ?>
                        <!-- <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="#"><i class="fa fa-suitcase" aria-hidden="true"></i> Berita Acara</a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Aanwijzing Pengadaan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 400px;">Nama Paket</th>
                                <td><?= $rup['nama_rup'] ?></td>
                            </tr>
                            <tr>
                                <th>Kode Tender</th>
                                <td><?= $rup['kode_rup'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama Jenis Pengadaan</th>
                                <td>Pengadaan <?= $rup['nama_jenis_pengadaan'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama Metode Pemilihan </th>
                                <td><?= $rup['nama_metode_pengadaan'] ?> <?= $rup['metode_kualifikasi'] ?> (<?= $rup['metode_dokumen'] ?>)</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- test -->
            <br>
            <div class="card card_chat" style="background-image: linear-gradient(180deg, #b2eaff 0, #5389f2 50%, #003265 100%);">
                <div class="card-header card-chat" style="background-image: linear-gradient(90deg, hsla(206, 98%, 48%, 1) 3%, hsla(60, 100%, 50%, 1) 70%);">
                    <div class="d-flex bd-highlight">
                        <div class="img_cont">
                            <img src="<?= base_url('assets/chat_logo.png') ?>" class="rounded-circle user_img">
                            <span class="online_icon"></span>
                        </div>
                        <div class="user_info">
                            <span style="font-size: 13px;">Forum Chat Paket <?= $rup['nama_rup'] ?></span>
                            <p>Kode Tender : <?= $rup['kode_rup'] ?></p>
                        </div>
                    </div>
                    <span id="action_menu_btn"><img src="<?= base_url('assets/img/logo_asli.png') ?>" width="250px" alt=""></span>
                </div>
                <div class="card-body msg_card_body" id="letakpesan">

                </div>
                <div class="card-footer card-footer_chat" style="background-image: radial-gradient(circle at 50% -20.71%, #cfa8ff 0, #9d8bff 25%, #6c6cd8 50%, #3f4ea4 75%, #153375 100%);">
                    <div class="replay_orang"></div>
                    <form id="form_keuangan_add" enctype="multipart/form-data">
                        <input type="hidden" name="replay_tujuan">
                        <input type="hidden" name="replay_isi">
                        <div class="nongol_dok" style="display: none;">
                            <div class="bs-callout bs-callout-info ada_file" style="width: 300px;">
                                <label class="fake_input_dok"></label>
                                <a href="javascript:;" class="float-right" onclick="hapus_data_file()">X</a>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="hidden" name="id_pengirim" id="id_pengirim" value="<?= $this->session->userdata('id_vendor'); ?>">
                            <input type="hidden" name="id_rup" value="<?= $rup['id_rup'] ?>">
                            <div class="input-group-append">

                                <?php if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai'])) == date('Y-m-d H:i')) { ?>

                                    <?php $date2 = $jadwal_aanwijzing_pq['waktu_selesai'];
                                    $date20 = new DateTime($date2);
                                    $date_plus20 = $date20->modify("+3 hours");
                                    if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>

                                    <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai']))  == date('Y-m-d H:i')) { ?>
                                        <div class="input-group-text attach_btn">
                                            <button class="btn btn-danger btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file').click();"><i class="fas fa-paperclip"></i></button>
                                            <br>
                                            <button class="btn btn-primary btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file_img').click();"><i class="fas fa-camera-retro"></i></button>
                                        </div>
                                    <?php    } else { ?>
                                        <div class="input-group-text attach_btn">
                                            <button disabled class="btn btn-danger btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file').click();"><i class="fas fa-paperclip"></i></button>
                                            <br>
                                            <button disabled class="btn btn-primary btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file_img').click();"><i class="fas fa-camera-retro"></i></button>
                                        </div>
                                    <?php    } ?>
                                <?php } else { ?>
                                    <?php $date1 = $jadwal_aanwijzing_pq['waktu_selesai'];
                                    $date = new DateTime($date1);
                                    $date_plus = $date->modify("+3 hours");
                                    if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                                    <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                        <div class="input-group-text attach_btn">
                                            <button class="btn btn-danger btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file').click();"><i class="fas fa-paperclip"></i></button>
                                            <br>
                                            <button class="btn btn-primary btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file_img').click();"><i class="fas fa-camera-retro"></i></button>
                                        </div>
                                    <?php    } else { ?>
                                        <div class="input-group-text attach_btn">
                                            <button disabled class="btn btn-danger btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file').click();"><i class="fas fa-paperclip"></i></button>
                                            <br>
                                            <button disabled class="btn btn-primary btn-md btn-block" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file_img').click();"><i class="fas fa-camera-retro"></i></button>
                                        </div>
                                    <?php    } ?>
                                <?php } ?>


                                <input type="file" style="display:none;" id="file" name="dokumen_chat" />
                                <input type="file" style="display:none;" id="file_img" name="img_chat" />
                            </div>
                            <?php if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai'])) == date('Y-m-d H:i')) { ?>

                                <?php $date2 = $jadwal_aanwijzing_pq['waktu_selesai'];
                                $date20 = new DateTime($date2);
                                $date_plus20 = $date20->modify("+3 hours");
                                if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai'])) >= date('Y-m-d H:i')) { ?>

                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai']))  == date('Y-m-d H:i')) { ?>
                                    <textarea name="isi" class="form-control type_msg" placeholder="Type your message..."></textarea>
                                    <div class="input-group-append">
                                        <button type="submit" id="upload" name="upload" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>
                                    </div>
                                <?php    } else { ?>
                                    <textarea disabled name="isi" class="form-control type_msg" placeholder="Waktu Penjelasan Dokumen Prakualifikasi Sudah Habis..."></textarea>
                                    <div class="input-group-append">
                                    </div>
                                <?php    } ?>
                            <?php } else { ?>
                                <?php $date1 = $jadwal_aanwijzing_pq['waktu_selesai'];
                                $date = new DateTime($date1);
                                $date_plus = $date->modify("+3 hours");
                                if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai']))  >= date('Y-m-d H:i')) { ?>

                                <?php    } else if (date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_aanwijzing_pq['waktu_mulai'])) == date('Y-m-d H:i')) { ?>
                                    <textarea name="isi" class="form-control type_msg" placeholder="Type your message..."></textarea>
                                    <div class="input-group-append">
                                        <button type="submit" id="upload" name="upload" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></button>

                                    </div>
                                <?php    } else { ?>
                                    <textarea disabled name="isi" class="form-control type_msg" placeholder="Waktu Penjelasan Dokumen Pemilihan / Penawaran Sudah Habis..."></textarea>
                                    <div class="input-group-append">
                                    </div>
                                <?php    } ?>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>

            <hr>

        </div>
</main>


<!-- Modal -->
<div class="modal fade" id="modal_evaluasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>

                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card p-2 bg-primary">
                    <b><span class="text-white">Evaluasi PT. Kintek</span></b>
                </div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-administrasi" type="button" role="tab" aria-controls="pills-administrasi" aria-selected="true">1. Evaluasi Dokumen Administrasi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-tambahan" type="button" role="tab" aria-controls="pills-tambahan" aria-selected="false">2. Evaluasi Persyaratan Tambahan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-prakualifikasi" type="button" role="tab" aria-controls="pills-prakualifikasi" aria-selected="false">3. Evaluasi Nilai Prakualifikasi</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-teknis" type="button" role="tab" aria-controls="pills-teknis" aria-selected="false">4. Evaluasi Nilai Teknis</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-peringkat" type="button" role="tab" aria-controls="pills-peringkat" aria-selected="false">5. Evaluasi Peringkat Teknis</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-terkoreksi" type="button" role="tab" aria-controls="pills-terkoreksi" aria-selected="false">6. Evaluasi Harga Terkoreksi</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-negosiasi" type="button" role="tab" aria-controls="pills-negosiasi" aria-selected="false">7. Evaluasi Negosiasi</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-akhir" type="button" role="tab" aria-controls="pills-akhir" aria-selected="false">8. Evaluasi Nilai Akhir</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-administrasi" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Evaluasi Dokumen Administrasi
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Status Dokumen Persyaratan Dari Vms</th>
                                        <th>Status</th>
                                    </tr>
                                    <tr>
                                        <td>Dokumen Sesuai Vms/Dokumen Lengkap</td>
                                        <td><span class="btn btn-sm btn-success"><i class="fa fa-check"></i> Lengkap</span></td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-tambahan" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Evaluasi Persyaratan Tambahan
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Persyaratan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>On Going Project</td>
                                            <td><span class="btn btn-sm btn-success"><i class="fa fa-check"></i> Valid</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Dokumen_Kualifikasi_Paket IX</td>
                                            <td><span class="btn btn-sm btn-success"><i class="fa fa-check"></i> Valid</span></td>
                                        </tr>
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-prakualifikasi" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Evaluasi Nilai Prakualifikasi
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;">Nilai Prakualifikasi</th>
                                            <th><input type="text" class="form-control" placeholder="Nilai Prakualifikasi"></th>
                                        </tr>
                                    </thead>

                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-teknis" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Evaluasi Nilai Teknis
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;">Nilai Teknis</th>
                                            <th><input type="text" class="form-control" placeholder="Nilai Teknis"></th>
                                        </tr>
                                    </thead>

                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-peringkat" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Evaluasi Peringkat Teknis
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;">Peringkat Teknis</th>
                                            <th><input type="text" class="form-control" placeholder="Peringkat Teknis"></th>
                                        </tr>
                                    </thead>

                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-terkoreksi" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Evaluasi Penawaran Terkoreksi
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;">Penawaran Terkoreksi</th>
                                            <th><input type="text" class="form-control" placeholder="Penawaran Terkoreksi"></th>
                                            <th><input type="text" class="form-control" placeholder="RP" disabled></th>
                                        </tr>
                                    </thead>

                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-negosiasi" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Evaluasi Negosiasi
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;">Negosiasi</th>
                                            <th><input type="text" class="form-control" placeholder="Nilai Negosiasi"></th>
                                            <th><input type="text" class="form-control" placeholder="RP" disabled></th>
                                        </tr>
                                    </thead>

                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-akhir" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Evaluasi Nilai Akhir
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;">Nilai Akhir</th>
                                            <th><input type="text" class="form-control" placeholder="Nilai Akhir"></th>
                                        </tr>
                                    </thead>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>