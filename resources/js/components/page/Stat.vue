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
                                Stats
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
                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-content">
                                <h6 class="category text-success">Today Clicks</h6>

                                <h4 class="card-title">
                                    {{
                                        todayRecord
                                    }}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-content">
                                <h6 class="category text-success">Last 30 Days Clicks</h6>

                                <h4 class="card-title">
                                    {{
                                        monthRecord
                                    }}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-content">
                                <h6 class="category text-success">Total Clicks</h6>

                                <h4 class="card-title">
                                    {{
                                        statsLoad.length
                                    }}
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
                                            <th>Continent</th>
                                            <th>Country</th>
                                            <th>Device</th>
                                            <th>Os</th>
                                            <th>Browser</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div class="loader" v-if="loader"></div>
                                        <tr
                                            v-for="(stat, index) in statsLoad"
                                            :key="index"
                                        >
                                            <td class="td-name">
                                                {{ stat.continent }}
                                            </td>

                                            <td>
                                                {{ stat.country }}
                                            </td>

                                            <td>
                                                {{ stat.device }}
                                            </td>

                                            <td>
                                                {{ stat.os }}
                                            </td>
                                            <td>
                                                {{ stat.browser }}
                                            </td>
                                            <td>
                                                {{ stat.created_at }}
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
            statsLoad: [],
            todayRecord: '',
            monthRecord: '',
            loader: false
        };
    },
    mounted() {
        console.log(this.$route.params.id);
        this.loadStats(this.$route.params.id);
    },
    methods: {
        loadStats: async function(link) {
            this.loader = true;
            try {
                const response = await apiService.loadStat(link);
                this.statsLoad = response.data.stats.data;
                this.monthRecord = response.data.monthRecord;
                this.todayRecord = response.data.todayRecord;
                this.loader = false;
            } catch (error) {
                this.loader = false;
                this.flashMessage.error({
                    message: "Some error occured, please refresh",
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
