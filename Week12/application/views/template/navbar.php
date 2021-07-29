<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header" style="padding: 0 5%">
            <a class="navbar-brand" href="<?php echo site_url('Home'); ?>">Universitas Programmer</a>
        </div>
        <ul class="nav navbar-nav navbar-right" style="padding: 0 5%">
            <?php if($uri == 'Dosen'){ ?>
                <li class="active">
                    <a href="<?php echo site_url('Dosen'); ?>">Dosen</a>
                </li>
                <li>
                    <a href="<?php echo site_url('Mahasiswa'); ?>">Mahasiswa</a>
                </li>
            <?php
            } 
            else if($uri == 'Mahasiswa'){ ?>
                <li>
                    <a href="<?php echo site_url('Dosen'); ?>">Dosen</a>
                </li>
                <li  class="active">
                    <a href="<?php echo site_url('Mahasiswa'); ?>">Mahasiswa</a>
                </li>
            <?php
            } ?>
            
            <li class="dropdown">
                <a href="#">Hello, <?php echo $username; ?></a>
                    <div class="dropdown-content">
                        <a href="<?php echo site_url('Home/signOut'); ?>">Sign Out</a>
                    </div>
            </li>
        </ul>
    </div>
</nav>

<style>
    .dropdown-content{
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        border-style: solid;
        border-width: 1px;
        z-index: 1;
    }

    .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown:hover{
        background-color: #e6e6e6;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>