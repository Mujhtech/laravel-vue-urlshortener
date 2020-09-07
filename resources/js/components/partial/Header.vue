<template>
    <div>
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button
                        type="button"
                        class="navbar-toggle"
                        data-toggle="collapse"
                        data-target="#navigation-example"
                    >
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://www.creative-tim.com"
                        >Creative Tim</a
                    >
                </div>

                <div class="collapse navbar-collapse" id="navigation-example">
                    <ul class="nav navbar-nav navbar-center">
                        <li>
                            <router-link to="/" exact >Home</router-link>
                        </li>
                        <li v-if="isLogged">
                            <router-link to="/dashboard" exact >Dashboard</router-link>
                        </li>
                        <li v-if="isLogged">
                            <router-link to="/links" exact >Links</router-link>
                        </li>
                        <li v-if="isLogged">
                            <a>Domains <span style="color:red">(coming soon)</span></a>
                        </li>
                        <li v-if="isLogged">
                            <a @click="logout">Logout</a>
                        </li>
                        <li v-if="!isLogged">
                            <router-link to="/register" exact >Register</router-link>
                        </li>
                        <li v-if="!isLogged">
                            <router-link to="/login" exact >Login</router-link>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="https://twitter.com/CreativeTim">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/CreativeTim">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a
                                href="https://www.instagram.com/CreativeTimOfficial"
                            >
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
import * as apiService from '../../services/auth';
export default {
    data() {
        return {
            isLogged: false,
        }
    },
    mounted() {

        if(apiService.isLoggedIn()){

            this.isLogged = true;
        }

    },
    methods: {
        logout: async function() {
            try {
                const response = await apiService.logoutUser(this.user);
                this.errors = {};
                this.flashMessage.success({
                    message: "User Logout",
                    time: 5000
                });
                this.isLogged = false;
                this.$router.push("/");
            } catch (error) {
                console.log(error);
                switch (error.response.status) {
                    case 422:
                        this.errors = error.response.data.errors;
                        break;
                    case 401:
                        this.flashMessage.error({
                            message: error.response.data.message,
                            time: 5000
                        });
                        break;
                    case 500:
                        this.flashMessage.error({
                            message: error.response.data.message,
                            time: 5000
                        });
                        break;
                    default:
                        this.flashMessage.error({
                            message: "Some error occured, try again",
                            time: 5000
                        });
                        break;
                }
            }
        }
    }
};
</script>
