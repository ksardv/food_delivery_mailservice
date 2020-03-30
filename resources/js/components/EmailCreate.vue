<template>
    <form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Sender email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="sender@example.com">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Receiver email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="receiver@example.com">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Subject</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Subject">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Message</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    </form>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
