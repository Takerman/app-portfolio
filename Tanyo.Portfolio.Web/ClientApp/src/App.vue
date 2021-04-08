<template>
    <div>
        <app-header></app-header>
        <router-view />
        <app-footer></app-footer>
    </div>
</template>

<script>
import AppFooter from './components/AppFooter.vue';
import AppHeader from './components/AppHeader.vue';

export default {
    data() {
        return {
        };
    },
    components: {
        AppFooter,
        AppHeader
        },
    created() {
    }
};</script>

<style lang="scss">

</style>