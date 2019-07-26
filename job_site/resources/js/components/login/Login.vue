<template>
    <form @submit.prevent="login" role="form">
        <div class="card-body">


            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" v-model="form.email" placeholder="Enter email">
            </div>


            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" v-model="form.password">
            </div>


        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "Login",
        data() {
            return {
                form: {
                    password: '',
                    email: ''
                }
            }
        },
        methods: {
            login() {
                this.$axios.post('login',this.form).then(res => {
                    alert('Yes')
                }).catch(err => {
                    alert('No')
                })
            }
        }
    }
</script>

<style scoped>

</style>