<template>
    <div>
        <Header />
        <div
            class="page-header header-filter clear-filter"
            data-parallax="true"
            style="height: 50vh !important;"
        >
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="brand">
                            <h1 style="color:#9C27B0">
                                Dashboard
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="contentAreas" class="cd-section">
            <p></p>
            <p></p>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-blog">
                            <div class="card-content">
                                <h6 class="category text-success">Links</h6>

                                <h4 class="card-title">
                                    <router-link to="/links" exact>{{
                                        linksLoad.length
                                    }}</router-link>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-blog">
                            <div class="card-content">
                                <h6 class="category text-success">Clicks</h6>

                                <h4 class="card-title">
                                    <router-link to="/clicks" exact>{{
                                        totalClicks
                                    }}</router-link>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tables">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="table-responsive">
                                <table class="table table-shopping">
                                    <thead>
                                        <tr>
                                            <th class="text-center">URL</th>
                                            <th>Status</th>
                                            <th>Number of click</th>
                                            <th class="th-description">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div class="loader" v-if="loader"></div>
                                        <tr
                                            v-for="(link, index) in linksLoad"
                                            :key="index"
                                        >
                                            <td class="td-name">
                                                <router-link :to="{ name : 'stat', params : { id : link.id } }">
                                                    {{ link.short_link }}
                                                </router-link>
                                            </td>

                                            <td>
                                                <span
                                                    style="color:green"
                                                    v-if="!link.status"
                                                    >Active</span
                                                >
                                                <span
                                                    style="color:red"
                                                    v-if="link.status"
                                                    >Deactivate</span
                                                >
                                            </td>
                                            <td>
                                                {{ link.click }}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button
                                                        href="#pablo"
                                                        class="dropdown-toggle btn btn-primary btn-round btn-sm"
                                                        data-toggle="dropdown"
                                                        aria-expanded="false"
                                                    >
                                                        Action
                                                        <b class="caret"></b>
                                                        <div
                                                            class="ripple-container"
                                                        ></div>
                                                    </button>
                                                    <ul
                                                        class="dropdown-menu dropdown-menu-right"
                                                    >
                                                        <li>
                                                            <a
                                                                v-if="
                                                                    link.status
                                                                "
                                                                @click="
                                                                    activateSingleLink(
                                                                        link
                                                                    )
                                                                "
                                                                >Activate</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                v-if="
                                                                    !link.status
                                                                "
                                                                @click="
                                                                    deactivateSingleLink(
                                                                        link
                                                                    )
                                                                "
                                                                >Deactivate</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                :href="
                                                                    link.short_link
                                                                "
                                                                v-if="
                                                                    !link.status
                                                                "
                                                                target="_blanck"
                                                                >Preview</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <router-link :to="{ name : 'stat', params : { id : link.id } }">
                                                                Stats
                                                            </router-link>
                                                        </li>
                                                        <li
                                                            class="divider"
                                                        ></li>
                                                        <li>
                                                            <a
                                                                @click="
                                                                    deleteLink(
                                                                        link
                                                                    )
                                                                "
                                                                >Delete</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Header from "../partial/Header";
import * as apiService from "../../services/fetch";
export default {
    data() {
        return {
            linksLoad: [],
            totalClicks: '',
            loader: false
        };
    },
    mounted() {
        this.loadLinks();
    },
    methods: {
        loadLinks: async function() {
            this.loader = true;
            try {
                const response = await apiService.loadLinks();
                this.linksLoad = response.data.links.data;
                this.totalClicks = response.data.clicks;
                this.loader = false;
            } catch (error) {
                this.loader = false;
                this.flashMessage.error({
                    message: "Some error occured, please refresh",
                    time: 5000
                });
            }
        },
        deleteLink: async function(link) {
            if (!window.confirm(`Are you sure you want to delete`)) {
                return;
            }
            this.loader = true;
            try {
                const response = await apiService.deleteLink(link.id);

                this.linksLoad = this.linksLoad.filter(obj => {
                    return obj.id != link.id;
                });
                this.flashMessage.error({
                    message: "Link deleted successfully",
                    time: 5000
                });
                this.loader = false;
            } catch (error) {
                this.loader = false;
                this.flashMessage.error({
                    message: error.response.data.message,
                    time: 5000
                });
            }
        },
        activateSingleLink: async function(link) {
            if (
                !window.confirm(`Are you sure you want to activate this link`)
            ) {
                return;
            }
            this.loader = true;
            try {
                const response = await apiService.activateLink(link.id);

                this.loadLinks();

                this.flashMessage.error({
                    message: "Link activated successfully",
                    time: 5000
                });
                this.loader = false;
            } catch (error) {
                this.loader = false;
                this.flashMessage.error({
                    message: error.response.data.message,
                    time: 5000
                });
            }
        },
        deactivateSingleLink: async function(link) {
            if (
                !window.confirm(`Are you sure you want to deactivate this link`)
            ) {
                return;
            }
            this.loader = true;
            try {
                const response = await apiService.deactivateLink(link.id);

                this.loadLinks();

                this.flashMessage.error({
                    message: "Link deactivated successfully",
                    time: 5000
                });
                this.loader = false;
            } catch (error) {
                this.loader = false;
                this.flashMessage.error({
                    message: error.response.data.message,
                    time: 5000
                });
            }
        }
    },
    components: {
        Header
    }
};
</script>
<style scoped>
.loader {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border: 10px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #9c27b099; /* Blue */
    border-radius: 50%;
    width: 75px;
    height: 75px;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
