<style>

    .navbar {
        background-color: #2b2b2b;
        border-radius: 0;
        margin-bottom: 0;
        height: 0;
    }

    .nav > li {
        width: 100px;
        border-right: 2px solid #ef810a;
    }

    .nav > li > a {
        border-radius: 0;
        color: #FFFFFF;
        background-color: #2b2b2b;
    }

    .nav > li:last-child {
        border-right: none;
    }

    .nav > li > a:hover {
        color: #ef810a;
        background-color: #2b2b2b;
    }

    .nav > li > a:active {
        color: #ef810a;
        background-color: #2b2b2b;
    }

    .nav > li > a:focus {
        color: #ef810a;
        background-color: #2b2b2b;
    }

    .nav .open > a, .nav .open > a:focus, .nav .open > a:hover {
        border-color: #2b2b2b;
    }

    /*.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {*/
        /*color: #2b2b2b;*/
        /*background-color: #FFFFFF;*/
    /*}*/

    /*.dropdown-menu {*/
    /*background-color: #2b2b2b;*/
    /*border-radius: 0;*/
    /*}*/

    .dropdown-menu > li > a {
        color: #FFFFFF;
    }

    .dropdown-menu > li > a:hover {
        color: #ef810a;
        background-color: #2b2b2b;
    }

    .nav .open > a, .nav .open > a:focus, .nav .open > a:hover {
        color: #ef810a;
        background-color: #2b2b2b;
    }

    .navbar .navbar-nav {
        display: inline-block;
        float: none;
    }

    .navbar .navbar-collapse {
        text-align: center;
    }

</style>

<nav class="navbar shabu-menu" role="navigation">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a href="/">หน้าแรก</a></li>
            <li><a href="/about">เกี่ยวกับเรา</a></li>
            <li><a href="/branch">สาขา</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
