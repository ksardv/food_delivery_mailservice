<template>
    <form id="new-mail" @submit.prevent="checkForm">
        <div class="form-group">
            <label for="exampleFormControlInput1">Sender email address</label>
            <input type="email" class="form-control" id="from" v-model="email.from.email" name="from" placeholder="sender@example.com" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Receiver email address</label>
            <input type="email" class="form-control" id="to" v-model="email.to.email" name="to" placeholder="receiver@example.com" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Subject</label>
            <input type="text" class="form-control" id="subject" v-model="email.subject" name="subject" placeholder="Subject" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Message</label>
            <textarea class="form-control" id="content" v-model="email.text" name="content" rows="3" required></textarea>
        </div>
        <button type="submit">Send</button>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                email:{
                    from: {
                        name: null,
                        email: null
                    },
                    to: {
                        name: null,
                        email: null
                    },
                    subject: null,
                    text: null,
                    html: null
                }
            }
        },
        methods: {
            checkForm: function () {
                if (!this.email.from) {
                    console.log('Sender email is required.');
                }
                if (!this.email.to) {
                    console.log('Receiver email is required.');
                }
                if (!this.email.subject) {
                    console.log('Subject is required.');
                }
                if (!this.email.text) {
                    console.log('Email content is required.');
                }

                if (this.email.from && this.email.to && this.email.subject && this.email.text) {
                    let emailTo = this.email.to.email;
                    let emailFrom = this.email.from.email;
                    this.email.from.name = emailFrom.split("@")[0];
                    this.email.to.name = emailTo.split("@")[0];
                    this.send();
                }
            },
            send: function()
            {
                axios.post('/mails', { message: this.email })
                .then((response) => {
                    if (response.status == 201) {
                        this.$router.push({ path: 'list-email' })
                    }
                })
                .catch(error => console.log(error))
            }
        }
    }
</script>
