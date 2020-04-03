<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand text-warning" href="#">Mailservice</a>
            <router-link to="/create-email">Creare new email</router-link>
            <router-link to="/list-email">List all emails</router-link>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
