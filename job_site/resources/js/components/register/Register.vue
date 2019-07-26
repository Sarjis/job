<template>
    <form @submit.prevent="saveRegistrationInfo" role="form">
        <div class="card-body">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" v-model="form.first_name" placeholder="First Name">
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" v-model="form.last_name" placeholder="Last Name">
            </div>

            <div class="form-group">
                <label>Registered As ? </label>
                <select class="form-control" v-model="form.type">
                    <option value="2">Applicant</option>
                    <option value="1">Company</option>

                </select>
                {{form.type}}
            </div>

            <div v-if="form.type===1" class="form-group">
                <label>Business Name</label>
                <input type="text" class="form-control" v-model="form.business_name" placeholder="Business Name">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" v-model="form.email" placeholder="Enter email">
            </div>


            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" v-model="form.password">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" v-model="form.password_confirmation" placeholder="Password">
            </div>


        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
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
                    type: 2,
                    password: '',
                    password_confirmation: '',
                }
            }
        },
        methods: {
            saveRegistrationInfo() {
                this.$axios.post('register', this.form).then(function (res) {
                    alert('Hi')
                }).catch(function (err) {
                    alert('No')
                })

            }
        }
    }
</script>

<style scoped>

</style>