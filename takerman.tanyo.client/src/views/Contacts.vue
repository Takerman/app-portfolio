<template>
    <section class="section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <form class="form-contact contact_form">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" v-model="subject" id="subject" type="text" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" v-model="name" id="name" type="text" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" v-model="email" id="email" type="email" placeholder="Enter email address">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" v-model="message" id="message" cols="30" rows="9" placeholder="Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-success" type="button" @click="send()">SEND</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3><a href="tel:+447383721742">UK: +447383721742</a></h3>
                        <h3 style="margin-top: 5px;"><a href="tel:+359897887191">BG: +359897887191</a></h3>
                        <p style="margin-top: 10px;">Mon to Fri 9am to 6pm</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3><a href="mailto:tivanov@takerman.net">tivanov@takerman.net</a></h3>
                        <p>Send me your query anytime!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script lang="js">
import homeService from "../services/homeService";

export default {
    data() {
        return {
            subject: "",
            name: "",
            email: "",
            message: ""
        }
    },
    methods: {
        async send() {
            await homeService.sendMessage({
                subject: this.subject,
                name: this.name,
                email: this.email,
                message: this.message
            });
        }
    },
}
</script>

<style scoped></style>