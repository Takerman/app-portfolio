<template>
    <section style="margin-left: auto; margin-right: auto; margin-top: 70px; margin-bottom: 70px; padding: 20px; width: 50%; border: 1px solid gray; text-align: center;">
        <h2 class="text-danger">An error occurred <br />while processing your request</h2>

        <p v-if="requestId">
            <strong>Request ID:</strong> <code>{{ requestId }}</code>
        </p>

        <h3>
            We will handle it
        </h3>
        <p>
            A automatic message bout the exception has been already sent to me. <br /> Great apologies for the uncomfortable situation and hope it will not occure again.<br /> You can use the contact form to send me a quick message anytime.
        </p>
    </section>
</template>

<script lang="js">
export default {
    data() {
        return {
            requestId: null
        }
    }
}
</script>