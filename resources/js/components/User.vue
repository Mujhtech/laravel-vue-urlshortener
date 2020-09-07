<template>
    <main>
        <div class="wrapper ">
            <Header />
            <div class="main-panel">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top "
                >
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <div class="navbar-minimize">
                                <button
                                    id="minimizeSidebar"
                                    class="btn btn-just-icon btn-white btn-fab btn-round"
                                >
                                    <i
                                        class="material-icons text_align-center visible-on-sidebar-regular"
                                        >more_vert</i
                                    >
                                    <i
                                        class="material-icons design_bullet-list-67 visible-on-sidebar-mini"
                                        >view_list</i
                                    >
                                </button>
                            </div>
                            <a class="navbar-brand" href="javascript:;"
                                >Dashboard</a
                            >
                        </div>
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-toggle="collapse"
                            aria-controls="navigation-index"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="sr-only">Toggle navigation</span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                        </button>
                        <div
                            class="collapse navbar-collapse justify-content-end"
                        >
                            
                            <ul class="navbar-nav">
                                
                                <li class="nav-item dropdown">
                                    <a
                                        class="nav-link"
                                        href="javascript:;"
                                        id="navbarDropdownProfile"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                    >
                                        <i class="material-icons">person</i>
                                        <p class="d-lg-none d-md-block">
                                            Account
                                        </p>
                                    </a>
                                    <div
                                        class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="navbarDropdownProfile"
                                    >
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"
                                            >Log out</a
                                        >
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
                <div class="content">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-chart">
                                        <div
                                            class="card-header card-header-rose"
                                            data-header-animation="true"
                                        >
                                            <div
                                                class="ct-chart"
                                                id="websiteViewsChart"
                                            ></div>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                Website Views
                                            </h4>
                                            <p class="card-category">
                                                Last Campaign Performance
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <i class="material-icons"
                                                    >access_time</i
                                                >
                                                campaign sent 2 days ago
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-chart">
                                        <div
                                            class="card-header card-header-success"
                                            data-header-animation="true"
                                        >
                                            <div
                                                class="ct-chart"
                                                id="dailySalesChart"
                                            ></div>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                Daily Sales
                                            </h4>
                                            <p class="card-category">
                                                <span class="text-success"
                                                    ><i
                                                        class="fa fa-long-arrow-up"
                                                    ></i>
                                                    55%
                                                </span>
                                                increase in today sales.
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <i class="material-icons"
                                                    >access_time</i
                                                >
                                                updated 4 minutes ago
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-chart">
                                        <div
                                            class="card-header card-header-info"
                                            data-header-animation="true"
                                        >
                                            <div
                                                class="ct-chart"
                                                id="completedTasksChart"
                                            ></div>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                Completed Tasks
                                            </h4>
                                            <p class="card-category">
                                                Last Campaign Performance
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <i class="material-icons"
                                                    >access_time</i
                                                >
                                                campaign sent 2 days ago
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div
                                            class="card-header card-header-warning card-header-icon"
                                        >
                                            <div class="card-icon">
                                                <i class="material-icons"
                                                    >weekend</i
                                                >
                                            </div>
                                            <p class="card-category">
                                                Bookings
                                            </p>
                                            <h3 class="card-title">184</h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <i
                                                    class="material-icons text-danger"
                                                    >warning</i
                                                >
                                                <a href="#pablo"
                                                    >Get More Space...</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div
                                            class="card-header card-header-rose card-header-icon"
                                        >
                                            <div class="card-icon">
                                                <i class="material-icons"
                                                    >equalizer</i
                                                >
                                            </div>
                                            <p class="card-category">
                                                Website Visits
                                            </p>
                                            <h3 class="card-title">75.521</h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <i class="material-icons"
                                                    >local_offer</i
                                                >
                                                Tracked from Google Analytics
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div
                                            class="card-header card-header-success card-header-icon"
                                        >
                                            <div class="card-icon">
                                                <i class="material-icons"
                                                    >store</i
                                                >
                                            </div>
                                            <p class="card-category">Revenue</p>
                                            <h3 class="card-title">$34,245</h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <i class="material-icons"
                                                    >date_range</i
                                                >
                                                Last 24 Hours
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div
                                            class="card-header card-header-info card-header-icon"
                                        >
                                            <div class="card-icon">
                                                <i class="fa fa-twitter"></i>
                                            </div>
                                            <p class="card-category">
                                                Followers
                                            </p>
                                            <h3 class="card-title">+245</h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <i class="material-icons"
                                                    >update</i
                                                >
                                                Just Updated
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <Footer />
            </div>
        </div>
    </main>
</template>

<script>
import Header from "./partial/user/Header";
import Footer from "./partial/user/Footer";
export default {
    components: {
        Header,
        Footer
    }
};
</script>
