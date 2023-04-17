<?php 
// if(!defined("PAGE_ACCESS")){
//    echo "<script> window.location.href = './' ;</script>";
// } 
?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php if($active_page === 'dashboard'){echo "";}else{echo "collapsed";} ?>" href="blood_bank_dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        
            <!-- End Components Nav -->
        <!--<li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="forms-elements.html">
                            <i class="bi bi-circle"></i><span>Form Elements</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-layouts.html">
                            <i class="bi bi-circle"></i><span>Form Layouts</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-editors.html">
                            <i class="bi bi-circle"></i><span>Form Editors</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-validation.html">
                            <i class="bi bi-circle"></i><span>Form Validation</span>
                        </a>
                    </li>
                </ul>
            </li> End Forms Nav -->

        <!--<li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tables-general.html">
                            <i class="bi bi-circle"></i><span>General Tables</span>
                        </a>
                    </li>
                    <li>
                        <a href="tables-data.html">
                            <i class="bi bi-circle"></i><span>Data Tables</span>
                        </a>
                    </li>
                </ul>
            </li> End Tables Nav -->

        <!--<li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="charts-chartjs.html">
                            <i class="bi bi-circle"></i><span>Chart.js</span>
                        </a>
                    </li>
                    <li>
                        <a href="charts-apexcharts.html">
                            <i class="bi bi-circle"></i><span>ApexCharts</span>
                        </a>
                    </li>
                    <li>
                        <a href="charts-echarts.html">
                            <i class="bi bi-circle"></i><span>ECharts</span>
                        </a>
                    </li>
                </ul>
            </li>End Charts Nav -->

        <!--<li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="icons-bootstrap.html">
                            <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons-remix.html">
                            <i class="bi bi-circle"></i><span>Remix Icons</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons-boxicons.html">
                            <i class="bi bi-circle"></i><span>Boxicons</span>
                        </a>
                    </li>
                </ul>
            </li> End Icons Nav -->

        <!-- <li class="nav-heading">Pages</li> -->

        <li class="nav-item">
            <a class="nav-link <?php if($active_page === 'profile'){echo "";}else{echo "collapsed";} ?>" href="blood_bank_profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link <?php if($active_page === 'stock'){echo "";}else{echo "collapsed";} ?>" href="stock.php">
                <i class="bi bi-person"></i>
                <span>Stock</span>
            </a>
        </li><!-- End stock Page Nav -->
        <li class="nav-item">
            <a class="nav-link <?php if($active_page === 'donar'){echo "";}else{echo "collapsed";} ?>" href="donar.php">
                <i class="bi bi-person"></i>
                <span>Donar</span>
            </a>
        </li>
        <!-- End donar Page Nav -->
        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="donation_request.php">
                <i class="bi bi-person"></i>
                <span>Donation Request</span>
            </a>
        </li> -->
        <!-- End donation Page Nav -->
        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="manage_donation.php">
                <i class="bi bi-person"></i>
                <span>Manage Donation</span>
            </a>
        </li> -->
        <!-- End manage_donation Page Nav -->
        <li class="nav-item">
                <a class="nav-link <?php if($active_page === 'need_blood'){echo "";}else if($active_page === 'manage_need_blood') {echo "";}else{echo "collapsed";} ?>" data-bs-target="#need_blood-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Need Blood</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="need_blood-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="need_blood_request.php" class="<?php echo  $active_page === 'need_blood' ? "active":"" ?>">
                           <span>View Request</span>
                        </a>
                    </li>
                    <li>
                        <a href="manage_need_blood.php" class="<?php echo  $active_page === 'manage_need_blood' ? "active":"" ?>">
                           <span>Manage Need Blood</span>
                        </a>
                    </li>
                </ul>
            </li> 
            <?php //echo  $active_page === 'donate_req' ? "":"collapsed" ?>
             <?php //echo  $active_page ?> 
           <!-- end need Blood -->
        <li class="nav-item">
                <a class="nav-link <?php if($active_page === 'donate_req'){echo "";}else if($active_page === 'manage_donate') {echo "";}else if($active_page === 'donation_list') {echo "";}else{echo "collapsed";} ?>" data-bs-target="#blood_donation-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Blood Donation</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="blood_donation-nav" class="nav-content <?php //if($active_page === 'donate_req'){echo "";}else if($active_page === 'manage_donate') {echo "";}else{echo "collapse";} ?> collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="donation_request.php" class="<?php echo  $active_page === 'donate_req' ? "active":"" ?>">
                           <span>View Request</span>
                        </a>
                    </li>
                    <li>
                        <a href="donation_list.php" class="<?php echo  $active_page === 'donation_list' ? "active":"" ?>">
                           <span>Blood Donation Lists</span>
                        </a>
                    </li>
                    <li>
                        <a href="manage_donation.php" class="<?php echo  $active_page === 'manage_donate' ? "active":"" ?>">
                            <span>Manage Blood Donation</span>
                        </a>
                    </li>
                </ul>
            </li> 

 <!-- end blood donation -->
        <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="pages-faq.html">
                    <i class="bi bi-question-circle"></i>
                    <span>F.A.Q</span>
                </a>
            </li>End F.A.Q Page Nav -->

        <!--<li class="nav-item">
                <a class="nav-link collapsed" href="pages-contact.html">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li> End Contact Page Nav -->

        <!--  <li class="nav-item">
                <a class="nav-link collapsed" href="pages-register.html">
                    <i class="bi bi-card-list"></i>
                    <span>Register</span>
                </a>
            </li> End Register Page Nav -->

        <!--<li class="nav-item">
                <a class="nav-link collapsed" href="pages-login.html">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            </li> End Login Page Nav -->

        <!--<li class="nav-item">
                <a class="nav-link collapsed" href="pages-error-404.html">
                    <i class="bi bi-dash-circle"></i>
                    <span>Error 404</span>
                </a>
            </li> End Error 404 Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li><!-- End Blank Page Nav -->

    </ul>

</aside><!-- End Sidebar-->