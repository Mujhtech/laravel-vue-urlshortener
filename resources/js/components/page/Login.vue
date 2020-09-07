<template>
    <div>
        <Header />

        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div
                        class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3"
                    >
                        <div class="card card-signup">
                            <form class="form" v-on:submit.prevent="login">
                                <div class="header header-primary text-center">
                                    <h4 class="card-title">Log in</h4>
                                    <div class="social-line">
                                        <a
                                            href="#pablo"
                                            class="btn btn-just-icon btn-simple"
                                        >
                                            <i
                                                class="fa fa-facebook-square"
                                            ></i>
                                        </a>
                                        <a
                                            href="#pablo"
                                            class="btn btn-just-icon btn-simple"
                                        >
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a
                                            href="#pablo"
                                            class="btn btn-just-icon btn-simple"
                                        >
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <p class="description text-center">
                                    Or Be Classical
                                </p>
                                <div class="card-content">

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <input
                                            type="text"
                                            v-model="user.email"
                                            class="form-control"
                                            placeholder="Email..."
                                        />
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons"
                                                >lock_outline</i
                                            >
                                        </span>
                                        <input
                                            type="password"
                                            v-model="user.password"
                                            placeholder="Password..."
                                            class="form-control"
                                        />
                                    </div>

                                    <!-- If you want to add a checkbox to this form, uncomment this code

								<div class="checkbox">
									<label>
										<input type="checkbox" name="optionsCheckboxes" checked>
										Subscribe to newsletter
									</label>
								</div> -->
                                </div>
                                <div class="footer text-center">
                                    <button
                                        type="submit"
                                        class="btn btn-primary btn-simple btn-wd btn-lg"
                                        >Login</button
                                    >
                                </div>
                                <div class="loader" v-if="loader"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="http://www.creative-tim.com">
                                    Creative Tim
                                </a>
                            </li>
                            <li>
                                <a href="http://presentation.creative-tim.com">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="http://www.creative-tim.com/license">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright pull-right">
                        &copy; , made with <i class="fa fa-heart heart"></i> by
                        <a href="http://www.creative-tim.com" target="_blank"
                            >Creative Tim</a
                        >
                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>
<script>
import Header from "../partial/Header";
import * as apiService from '../../services/auth';
export default {
    name: "Login",
    data() {
        return {
            user: {
                email: "",
                password: "",
                remember_me: false
            },
            loader: false,
            errors: {}
        };
    },
    mounted() {},
    methods: {
        login: async function() {
            this.loader = true;
            try {
                const response = await apiService.loginUser(this.user);
                this.errors = {};
                this.flashMessage.success({
                    message: "Successful login",
                    time: 5000
                });
                this.loader = false;
                this.$router.push("/");
            } catch (error) {
                this.loader = false;
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
    },
    components: {
        Header
    }
};
</script>
<style scoped>
    .loader {
        position: absolute;
        left:50%;
        top:50%;
        transform: translate(-50%, -50%);
        border: 10px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #9c27b099; /* Blue */
        border-radius: 50%;
        width: 75px;
        height: 75px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
