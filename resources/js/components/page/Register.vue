<template>
    <div>
        <Header />

        <div
            class="page-header header-filter"
            filter-color="purple"
            style="background-image: url('../assets/img/bg7.jpg'); background-size: cover; background-position: top center;"
        >
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="card card-signup">
                            <h2 class="card-title text-center">Register</h2>
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="info info-horizontal">
                                        <div class="icon icon-rose">
                                            <i class="material-icons"
                                                >timeline</i
                                            >
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title">
                                                Marketing
                                            </h4>
                                            <p class="description">
                                                We've created the marketing
                                                campaign of the website. It was
                                                a very interesting
                                                collaboration.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="info info-horizontal">
                                        <div class="icon icon-primary">
                                            <i class="material-icons">code</i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title">
                                                Fully Coded in HTML5
                                            </h4>
                                            <p class="description">
                                                We've developed the website with
                                                HTML5 and CSS3. The client has
                                                access to the code using GitHub.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="info info-horizontal">
                                        <div class="icon icon-info">
                                            <i class="material-icons">group</i>
                                        </div>
                                        <div class="description">
                                            <h4 class="info-title">
                                                Built Audience
                                            </h4>
                                            <p class="description">
                                                There is also a Fully
                                                Customizable CMS Admin Dashboard
                                                for this product.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="social text-center">
                                        <button
                                            class="btn btn-just-icon btn-round btn-twitter"
                                        >
                                            <i class="fa fa-twitter"></i>
                                        </button>
                                        <button
                                            class="btn btn-just-icon btn-round btn-dribbble"
                                        >
                                            <i class="fa fa-dribbble"></i>
                                        </button>
                                        <button
                                            class="btn btn-just-icon btn-round btn-facebook"
                                        >
                                            <i class="fa fa-facebook"> </i>
                                        </button>
                                        <h4>or be classical</h4>
                                    </div>

                                    <form class="form" v-on:submit.prevent="register">
                                        <div class="card-content">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons"
                                                        >face</i
                                                    >
                                                </span>
                                                <input
                                                    type="text"
                                                    v-model="user.firstname"
                                                    class="form-control"
                                                    placeholder="First Name..."
                                                />
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons"
                                                        >face</i
                                                    >
                                                </span>
                                                <input
                                                    type="text"
                                                    v-model="user.lastname"
                                                    class="form-control"
                                                    placeholder="Last Name..."
                                                />
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons"
                                                        >face</i
                                                    >
                                                </span>
                                                <input
                                                    type="text"
                                                    v-model="user.username"
                                                    class="form-control"
                                                    placeholder="User Name..."
                                                />
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons"
                                                        >email</i
                                                    >
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

                                            <div class="checkbox">
                                                <label>
                                                    <input
                                                        type="checkbox"
                                                        name="optionsCheckboxes"
                                                        checked
                                                    />
                                                    I agree to the
                                                    <a href="#something"
                                                        >terms and conditions</a
                                                    >.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="footer text-center">
                                            <button
                                                type="submit"
                                                class="btn btn-primary btn-round"
                                                >Register</button
                                            >
                                        </div>
                                        <div class="loader" v-if="loader"></div>
                                    </form>
                                </div>
                            </div>
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
                        &copy; made with <i class="fa fa-heart heart"></i> by
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
    name: "Register",
    mounted() {
        
    },
    data() {
        return {
            user: {
                firstname: '',
                lastname: '',
                username: '',
                email: '',
                password: ''
            },
            loader: false,
            errors: {}
        }
    },
    methods: {

        register: async function() {
            this.loader = true;
            try {
                await apiService.registerUser(this.user);
                this.errors = {};
                this.flashMessage.success({
                    message: 'Registration successful, Please login',
                    time: 5000
                });
                this.loader = false;
                this.$router.push('/login');
            } catch (error) {
                this.loader = false;
                switch (error.response.status) {
                    case 422:
                        this.errors = error.response.data.errors;
                        break;
                    case 500:
                        this.flashMessage.error({
                            message: error.response.data.message,
                            time: 5000
                        });
                        break;
                    default:
                        this.flashMessage.error({
                            message: 'Some error occured, try again',
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
