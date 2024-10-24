<template>
    <div class="container">
        <div class="row">
            <button class="btn btn-info" @click="backupAll()">Backup All</button>
        </div>
        <div class="row">
            <h2 class="text-center">Databases</h2>
            <p>
                <strong class="text-center">{{ state }}</strong>
            </p>
            <table class="table table-borderless">
                <tr v-for="(database, key) in databases" :key="key">
                    <td>{{ database.name }}</td>
                    <td>{{ database.size.toFixed(2) }} MB</td>
                    <td>{{ database.location }}</td>
                    <td>
                        <button class="btn btn-info" @click="viewTanyo(database.name)">tanyo</button>
                        <button class="btn btn-info" @click="remove(database.name)">remove</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script lang="js">

export default {
    data() {
        return {
            databases: [],
            state: ''
        }
    },
    async mounted() {
        await this.getAll();
    },
    methods: {
        viewTanyo(database) {
            this.$router.push({ name: 'tanyo', params: { database } });
        },
        async getAll() {
            this.state = 'loading';
            this.databases = await (await fetch('/Databases/GetAll')).json();
            this.state = '';
        },
        async backupAll() {
            this.state = 'loading';
            let result = await fetch('/Tanyo/BackupAll');
            if (result)
                this.state = 'backuped all';
            else
                this.state = 'cannot backup all';

            this.getAll();
        },
        async remove(database) {
            this.state = 'loading';
            let result = await fetch('/Databases/Delete?database=' + database);
            if (result)
                this.state = 'removed';
            else
                this.state = 'cannot remove';

            this.getAll();
        }
    }
}
</script>

<style scoped></style>