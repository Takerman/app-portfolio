<template>
    <div class="container">
        <div class="row">
            <button class="btn btn-info" @click="backup()">Backup</button>
            <button class="btn btn-info" @click="removeAll()">Delete All</button>
        </div>
        <div class="row">
            <h2 class="text-center">Tanyo</h2>
            <p>
                <strong class="text-center">{{ this.state }}</strong>
            </p>
            <table class="table table-borderless">
                <tr v-for="(backup, key) in this.tanyo" :key="key">
                    <td>{{ backup.created }}</td>
                    <td>{{ backup.name }}</td>
                    <td>{{ backup.location }}</td>
                    <td>{{ (backup.size / 1024).toFixed(2) }} MB</td>
                    <td>
                        <button class="btn btn-info" @click="restore(backup.name)">restore</button>
                        <button class="btn btn-info" @click="remove(backup.name)">remove</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script lang="js">
import { useRoute } from 'vue-router';


export default {
    data() {
        return {
            tanyo: [],
            state: '',
            database: ''
        }
    },
    async mounted() {
        const { params } = useRoute();
        this.database = params.database;
        this.getForDatabase();
    },
    methods: {
        async getForDatabase() {
            this.state = 'loading';
            this.tanyo = await (await fetch('/Tanyo/GetForDatabase?database=' + this.database)).json();

            if (!this.tanyo || this.tanyo.length == 0)
                this.state = 'no tanyo';
            else
                this.state = '';
        },
        async backup() {
            let result = await (await fetch('/Tanyo/Backup?database=' + this.database + "&incremental=" + false)).json();
            if (result)
                this.state = 'backup finished';
            this.getForDatabase();
        },
        async restore(backup) {
            let result = await (await fetch('/Tanyo/Restore?backup=' + backup + "&database=" + this.database)).json();
            if (result)
                this.state = 'restore finished';
            this.getForDatabase();
        },
        async remove(backup) {
            let result = await (await fetch('/Tanyo/Delete?backup=' + backup)).json();
            if (result)
                this.state = 'removed';
            this.getForDatabase();
        },
        async removeAll() {
            let result = await (await fetch('/Tanyo/DeleteAll?database=' + this.database)).json();
            if (result)
                this.state = 'removed all';
            this.getForDatabase();
        }
    }
}
</script>

<style scoped></style>