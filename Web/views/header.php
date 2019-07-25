<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 14/11/17
 * Time: 17:00
 */


?>


<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">متجري</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <li class="dropdown  " style="background-color: rgb(3, 169, 244)!important;       background-image: url(../img/slide.png);">
            <a class="dropdown-toggle  " data-toggle="dropdown" href="#" >
                <i class="fa fa-user-circle-o "></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user pull-right ">
                <li><a href="logout.php"  class="text-right" ><i class=" fa fa-sign-out fa-fw "></i> الخروج</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar  " role="navigation" style="    position: fixed;
    overflow: visible;">
        <div class="sidebar-nav navbar-collapse ">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="row">
                        <div class="col-xs-4">
                            <img  class="img-responsive img-circle" src="../img/users-profil.png"/>
                            <!--                                <div class="status online hidden-xs"> </div>-->
                        </div>
                        <div class="col-xs-4 col-xs-pull-1">
                            <p class="text-justify " style="color: #FFFFFF; font-weight: bolder;
    font-size: 18px;" id="user"><?php echo $info_user[0]; ?>
                            </p>
                            <span > <i class="fa fa-circle   text-success"><span style="color:white;" id="userrole"> <?php if($info_user[1]=="admin"){echo "مشرف
";}else{echo "موظف";}  ?></span></i> </span>
                        </div>
                        <div class="clearfix"></div><br>
                        <div class=" col-xs-12 divider"></div>
                    </div>
                </li>
                <li style="    font-weight: bolder;
    font-size: 18px;">
                    <a href="admin.php"><i class="fa fa-dashboard fa-fw"></i> المخزون
                    </a>
                </li>

                <li style="    font-weight: bolder;
    font-size: 18px;">
                    <a href="consomation.php"><i class="fa fa-table fa-fw"></i> الإستهلاك
                    </a>
                </li>

                <li style="    font-weight: bolder;
    font-size: 18px;">
                    <a href="sales.php" id="load-sale"><i class="fa fa-bar-chart-o fa-fw"></i> المبيعات</a>
                </li>
                <?php if($info_user[1]=="admin"){ ?>
                <li style="    font-weight: bolder;
    font-size: 18px;">
                    <a href="users.php" id="load-sale"><i class="fa fa-user-circle fa-fw"></i> المستخدمين</a>
                </li>
                <li style="    font-weight: bolder;
    font-size: 18px;">
                    <a href="debt.php" id="load-sale"><i class="fa fa-dollar fa-fw"></i> الديون</a>
                </li>

                <?php }?>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
