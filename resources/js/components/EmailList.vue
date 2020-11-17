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
                    <tr v-for="email in emailsList" :key="email.id">
                        <td>{{ email.from }}</td>
                        <td>{{ email.to }}</td>
                        <td>{{ email.subject }}</td>
                        <td>{{ email.content }}</td>
                        <td>{{ email.status }}</td>
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
                .then((response) => {
                    this.emailsList = response.data
                })
                .catch(error => console.log(error))
        }
    }
</script>
