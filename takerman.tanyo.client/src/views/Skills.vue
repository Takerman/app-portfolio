<template>
    <Skills></Skills>
</template>

<script lang="js">
import Skills from '../components/Skills.vue';
import "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js";
import "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js";
import "https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-html5-1.6.1/cr-1.5.2/fh-3.1.6/r-2.2.3/sc-2.0.1/sl-1.3.1/datatables.min.js";

export default {
    data() {
        return {
            employmentTypeId: 0,
            locationId: 0
        }
    },
    methods: {
        async loadData() {
            let result = await (await fetch('Skills/GetTable?employmentTypeId=' + this.employmentTypeId + "&locationId=" + this.locationId)).json();
            var pricingTable = document.getElementById('tbl-pricing');
            if (pricingTable)
                pricingTable.html(data);
        }
    },
    mounted() {
        loadData();
    }
}
</script>

<style>
@import url('https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-html5-1.6.1/cr-1.5.2/fh-3.1.6/r-2.2.3/sc-2.0.1/sl-1.3.1/datatables.min.css');
</style>