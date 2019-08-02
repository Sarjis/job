<template>


    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">

                        <form @submit.prevent="saveRegistrationInfo" role="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" v-model="form.first_name" placeholder="First Name" required>
                                </div>

                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" v-model="form.last_name" placeholder="Last Name" required>
                                </div>

                                <div class="form-group">
                                    <label>Registered As ? </label>
                                    <select @change="changeType" class="form-control" v-model="form.type" required>
                                        <option  value="">se</option>
                                        <option value="0">Applicant</option>
                                        <option value="1">Company</option>

                                    </select>
                                    {{form.type}}
                                </div>

                                <div class="form-group">
                                    <label>Business Name</label>
                                    <input  type="text" class="form-control" v-model="form.business_name" placeholder="Business Name">
                                </div>




                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" v-model="form.email" required placeholder="Enter email">
                                </div>


                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" v-model="form.password" required>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" v-model="form.password_confirmation" required placeholder="Password">
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
        name: "Register",
        data() {
            return {
                form: {
                    first_name: '',
                    last_name: '',
                    business_name: '',
                    email: '',
                    type: 1,
                    password: '',
                    password_confirmation: '',
                },
                //type:true
            }
        },
        methods: {
            saveRegistrationInfo() {
                let that= this
                this.$axios.post('register', this.form).then(function (res) {
                    //alert('Hi');
                    that.$router.push('/')

                }).catch(function (err) {
                    alert('No')
                })

            },
            changeType() {

                // if (this.form.type === 1) {
                //     this.form.type = 0
                // } else {
                //     this.form.type = 1
                // }

                //this.form.type = !this.form.type
                alert('If you applicant you dont need to provide Business Name')
            }
        }
    }
</script>

<style scoped>

</style>