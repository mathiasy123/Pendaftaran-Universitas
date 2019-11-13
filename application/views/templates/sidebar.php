<main>
    <!-- NAVBAR -->
    <div class="navbar-fixed">
        <nav class="blue darken-2">
            <div class="container">
                <div class="nav-wrapper">

                    <!-- CEK ROLE ID -->
                    <?php 
                    if($this->session->userdata("role_id") == 1){
                        // JIKA YANG MASUK ADMIN, GANTI HOME NYA ADMIN
                        $url = "admin";
                    }else if($this->session->userdata("role_id") == 2){
                        // JIKA YANG MASUK KEUANGAN, GANTI HOME NYA KEUANGAN
                        $url = "keuangan";
                    }
                    ?>
                    <!-- END CEK ROLE ID -->

                    <a href="<?php echo base_url(); ?><?php echo $url; ?>" class="brand-logo">Data Manager</a>
                        <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i
                                class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                    <!-- QUERY SIDEBAR -->
                    <?php
                    // AMBIL DATA SESSION
                    $role_id = $this->session->userdata("role_id");
                    // QUERY UNTUK MENDAPATKAN USER ACCESS MENU YANG ID NYA 1 ATAU 2
                    $this->db->select("`user_menu`.`id`, `menu`");
                    $this->db->from("`user_menu`");
                    $this->db->join("`user_access_menu`", "`user_menu`.`id` = `user_access_menu`.`menu_id`");
                    $this->db->where("`user_access_menu`.`role_id`", $role_id);
                    $this->db->order_by(`user_access_menu`.`menu_id`, "ASC");
                    $navbar = $this->db->get()->result_array();  
                    ?>
                    <!-- END QUERY SIDEBAR -->
                        
                    <!-- LOOPING NAVBAR -->
                    <?php foreach($navbar as $nav)  : ?>
                    
                    <?php
                    // AMBIL ID NAVBAR BERDASARKAN USER MENU
                    $navId = $nav["id"];
                    // QUERY UNTUK MENDAPATKAN SUB-SUB MENURUT ID DARI USER MENU DENGAN ROLE YANG SUDAH DITENTUKAN
                    $this->db->select("*");
                    $this->db->from("`user_sub_menu`");
                    $this->db->join("`user_menu`", "`user_sub_menu`.`menu_id` = `user_menu`.`id`");
                    $this->db->where("`user_sub_menu`.`menu_id`", $navId);
                    $this->db->where("`user_sub_menu`.`is_active`", 1);
                    $subNavBar = $this->db->get()->result_array(); 
                    ?>

                    <!-- LOOPING SUB NAVBAR -->
                    <?php foreach($subNavBar as $subNav)  : ?>
            
                    <!-- MENENTUKAN HALAMAN AKTIF -->
                    <?php if($judul == $subNav["judul"]) : ?>
                    <li class="active">
                    <?php else : ?>
                    <li>
                    <?php endif; ?>
                    <!-- END MENENTUKAN HALAMAN AKTIF -->

                        <a href="<?php echo base_url(); ?><?php echo $subNav["url"]; ?>">
                            <?php echo $subNav["judul"]; ?>
                        </a>
                    </li>
                    <?php  endforeach; ?>
                    <!-- END LOOPING SUB NAVBAR -->
                    
                    <?php  endforeach; ?>
                    <!-- END LOOPING NAVBAR -->

                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- END NAVBAR -->

    <!-- SIDE NAVBAR -->
    <ul class="sidenav" id="mobile-nav">
        <!-- QUERY SIDEBAR -->
        <?php
        // AMBIL DATA SESSION
        $role_id = $this->session->userdata("role_id");
        // QUERY UNTUK MENDAPATKAN USER ACCESS MENU YANG ID NYA 1 ATAU 2  
        $this->db->select("`user_menu`.`id`, `menu`");
        $this->db->from("`user_menu`");
        $this->db->join("`user_access_menu`", "`user_menu`.`id` = `user_access_menu`.`menu_id`");
        $this->db->where("`user_access_menu`.`role_id`", $role_id);
        $this->db->order_by(`user_access_menu`.`menu_id`, "ASC");
        $navbar = $this->db->get()->result_array();
        ?>
        <!-- END QUERY NAVBAR -->

        <!-- LOOPING NAVBAR -->
        <?php foreach($navbar as $nav)  : ?>

        <?php
        // AMBIL ID NAVBAR BERDASARKAN USER MENU
        $navId = $nav["id"];
        // QUERY UNTUK MENDAPATKAN SUB-SUB MENURUT ID DARI USER MENU DENGAN ROLE YANG SUDAH DITENTUKAN 
        $this->db->select("*");
        $this->db->from("`user_sub_menu`");
        $this->db->join("`user_menu`", "`user_sub_menu`.`menu_id` = `user_menu`.`id`");
        $this->db->where("`user_sub_menu`.`menu_id`", $navId);
        $this->db->where("`user_sub_menu`.`is_active`", 1);
        $subNavBar = $this->db->get()->result_array(); 
        ?>

        <!-- LOOPING SUB NAVBAR -->
        <?php foreach($subNavBar as $subNav)  : ?>
        <li>
            <a href="<?php echo base_url(); ?><?= $subNav["url"]; ?>">
                <?= $subNav["judul"]; ?>
            </a>
        </li>
        <?php  endforeach; ?>
        <!-- END LOOPING SUB NAVBAR -->
        
        <?php  endforeach; ?>
        <!-- END LOOPING NAVBAR -->
    </ul>
    <!-- END NAVBAR -->