<template>
    <div>
        <div v-if="emailsList">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Content</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="email in emailsList" :key="email">
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div v-else>
            Няма изпратени мейли.
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                emailsList: {}
            }
        },
        mounted() {
            axios
                .get('/mails')
                .then(response => (this.emailsList = response.data))
                .catch(error => console.log(error))
        }
    }
</script>
