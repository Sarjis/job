<template>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">

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
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    alert('Permission Accessed')
                }).catch(err => {
                    alert('Permission Denied')
                })
            }
        }
    }
</script>

<style scoped>

</style>