<template>
    <div>
        <div class="header-2">
            <Header />
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <h1 class="title">You should work with us!</h1>
                            <h4>
                                Now you have no excuses, it's time to surprise
                                your clients, your competitors, and why not, the
                                world. You probably won't have a better chance
                                to show off all your potential if it's not by
                                designing a website for your own agency or web
                                studio.
                            </h4>
                        </div>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="card card-raised card-form-horizontal">
                                <div class="card-content">
                                    <form method="" action="">
                                        <div class="row" v-if="!generateData">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input
                                                        type="text"
                                                        value=""
                                                        placeholder="https://url-name"
                                                        class="form-control"
                                                        v-model="link"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <button
                                                    type="button"
                                                    class="btn btn-primary btn-block"
                                                    v-on:click="generateLink"
                                                >
                                                    Shorten
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row" v-if="generateData">
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input
                                                        type="text"
                                                        :value=" generateData.short_link "
                                                        class="form-control"
                                                        readonly
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <button
                                                    type="button"
                                                    class="btn btn-primary btn-block"
                                                    v-clipboard:copy="generateData.short_link"
                                                    v-clipboard:success="onCopy"
                                                    v-clipboard:error="onError"
                                                >
                                                    Copy
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cd-section" id="features">
            <div class="container">
                <div class="features-2">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <h2 class="title">Why our product is the best</h2>
                            <h5 class="description">
                                This is the paragraph where you can write more
                                details about your product. Keep you user
                                engaged by providing meaningful information.
                            </h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="info info-horizontal">
                                <div class="icon icon-info">
                                    <i class="material-icons">group_work</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Collaborate</h4>
                                    <p>
                                        The moment you use Material Kit, you
                                        know you’ve never felt anything like it.
                                        With a single use, this powerfull UI Kit
                                        lets you do more than ever before.
                                    </p>
                                    <a href="#pablo">Find more...</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info info-horizontal">
                                <div class="icon icon-danger">
                                    <i class="material-icons">airplay</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Airplay</h4>
                                    <p>
                                        Divide details about your product or
                                        agency work into parts. Write a few
                                        lines about each one. A paragraph
                                        describing a feature will be enough.
                                    </p>
                                    <a href="#pablo">Find more...</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info info-horizontal">
                                <div class="icon icon-success">
                                    <i class="material-icons">location_on</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">
                                        Location Integrated
                                    </h4>
                                    <p>
                                        Divide details about your product or
                                        agency work into parts. Write a few
                                        lines about each one. A paragraph
                                        describing a feature will be enough.
                                    </p>
                                    <a href="#pablo">Find more...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="features-4">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <h2 class="title">Your life will be much easier</h2>
                            <h5 class="description">
                                This is the paragraph where you can write more
                                details about your product. Keep you user
                                engaged by providing meaningful information.
                            </h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-md-offset-1">
                            <div class="info info-horizontal">
                                <div class="icon icon-info">
                                    <i class="material-icons">code</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">For Developers</h4>
                                    <p>
                                        The moment you use Material Kit, you
                                        know you’ve never felt anything like it.
                                        With a single use, this powerfull UI Kit
                                        lets you do more than ever before.
                                    </p>
                                </div>
                            </div>

                            <div class="info info-horizontal">
                                <div class="icon icon-danger">
                                    <i class="material-icons">format_paint</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">For Designers</h4>
                                    <p>
                                        Divide details about your product or
                                        agency work into parts. Write a few
                                        lines about each one. A paragraph
                                        describing a feature will be enough.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="phone-container">
                                <img src="" />
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="info info-horizontal">
                                <div class="icon icon-primary">
                                    <i class="material-icons">dashboard</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Bootstrap Grid</h4>
                                    <p>
                                        Divide details about your product or
                                        agency work into parts. Write a few
                                        lines about each one. A paragraph
                                        describing a feature will be enough.
                                    </p>
                                </div>
                            </div>

                            <div class="info info-horizontal">
                                <div class="icon icon-success">
                                    <i class="material-icons">view_carousel</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">
                                        Example Pages Included
                                    </h4>
                                    <p>
                                        Divide details about your product or
                                        agency work into parts. Write a few
                                        lines about each one. A paragraph
                                        describing a feature will be enough.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <Pricing />

        <Contact />
    </div>
</template>

<script>
import Header from "./partial/Header";
import Pricing from "./partial/Pricing";
import Contact from "./partial/Contact";
import * as apiService from '../services/fetch';
export default {
    data() {
        return {
            link: '',
            generateData: null,
            errors: {}
        }
    },
    mounted() {

    },
    methods: {
        emptyGetData: function () { 
            //get data
            this.generateData = null;

        },
        onCopy: function (e) {
            this.flashMessage.success({
                message: 'Copied',
                time: 5000
            });
            setTimeout(function () { 
                this.generateData = null
                console.log(this.generateData)
            }, 1000);
        },
        onError: function (e) {
            this.flashMessage.success({
                message: 'Failed to copy',
                time: 5000
            });
        },
        generateLink: async function() {

            let userLink = "";

            const pattern = /^((http|https|ftp):\/\/)/;
            
            userLink = (this.link != "" && !pattern.test(this.link)) ? "https://" + this.link : this.link;

            let formData = new FormData();
            formData.append('link', userLink);

            try {
                const response = await apiService.generateLink(formData);
                this.generateData = response.data;
                this.flashMessage.success({
                    message: 'Url shorten successfully',
                    time: 5000
                });
                this.link = '';
            } catch(error) {
                console.log(error);
                console.log(error.response);
                switch (error.response.status) {
                    case 422:
                        this.flashMessage.error({
                            message: error.response.data.message,
                            time: 5000
                        });
                        this.errors = error.response.data.errors;
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
        Header,
        Pricing,
        Contact
    }
};
</script>
