<template>
    <div class="inner-div">
        <div class="container">
            <form @submit="registerUser()">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input v-validate="'required'" autofocus type="text" class="form-control" id="name" name="name" placeholder="Enter name" v-model="newUser.name" required>
                  <div class="error-feedback">
                    <span>{{ errors.first('name') }}</span>
                  </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" v-model="newUser.gender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                            <br>
                            <date-picker v-validate="'required'" autofocus :lang="lang" name="birthday" v-model="newUser.birthday" style="font-family: 'Roboto', sans-serif;" required></date-picker>
                            <div class="error-feedback">
                              <span>{{ errors.first('birthday') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input v-validate="'required|email'" autofocus @blur="ifExist()" type="email" class="form-control" id="email" name="email" placeholder="Enter email" v-model="newUser.email" required>
                    <div class="error-feedback">
                      <span>{{ errors.first('email') }}</span>
                    </div>
                    <div class="error-feedback" v-if="isEmailExist">
                      <span>This email already exists</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact number</label>
                    <input v-validate="'required|digits:10'" autofocus type="tel" class="form-control" id="contact_number" name="contact_number" placeholder="Enter contact number" v-model="newUser.contact_number" required>
                    <div class="error-feedback">
                      <span>{{ errors.first('contact_number') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="user_role">Role</label>
                            <select class="form-control" id="user_role" name="user_role" v-model="newUser.user_role">
                                <option>Admin</option>
                                <option>Receptionist</option>
                                <option>Doctor</option>
                                <option>Lab Assistant</option>
                                <option>Pharmacist</option>
                            </select>
                        </div>
                    </div>
                    <div class="col" v-if="newUser.user_role=='Admin' || newUser.user_role=='Doctor'">
                        <div class="form-group">
                            <label for="slmc_number">SLMC Registration number</label>
                            <input v-validate="'required|max:5'" autofocus type="text" class="form-control" id="slmc_number" name="slmc_number" placeholder="Enter SLMC reg. no" v-model="newUser.slmc_number" required>
                            <div class="error-feedback">
                              <span>{{ errors.first('slmc_number') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="qualification">Qualification</label>
                    <select v-validate="'required'" autofocus class="form-control" id="qualification" name="qualification" v-model="newUser.qualification" required>
                        <template v-if="newUser.user_role=='Admin' || newUser.user_role=='Doctor'">
                            <option>MBBS [COLOMBO]</option>
                            <option>MBBS [PERADENIYA]</option>
                            <option>MBBS [RUHUNA]</option>
                            <option>MBBS [KELANIYA]</option>
                            <option>MBBS [RAJARATA]</option>
                            <option>MD </option>
                        </template>
                        <template v-else-if="newUser.user_role=='Receptionist'">
                            <option>BSN</option>
                            <option>MSN</option>
                        </template>
                        <!-- <template v-else-if="newUser.user_role=='Nurse'">
                            <option>Nurse qualification 1</option>
                            <option>Nurse qualification 2</option>
                        </template> -->
                        <template v-else-if="newUser.user_role=='Lab Assistant'">
                            <option>Lab Assistant qualification 1</option>
                            <option>Lab Assistant qualification 2</option>
                        </template>
                        <template v-else-if="newUser.user_role=='Pharmacist'">
                            <option>Pharm.D.</option>
                        </template>
                    </select>
                    <div class="error-feedback">
                      <span>{{ errors.first('qualification') }}</span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template> 

<script>
import DatePicker from 'vue2-datepicker';

    export default {
        components: { DatePicker },

        data() {
            return {
                newUser: {'name': '', 'gender': 'Male', 'birthday': '', 'email': '', 'contact_number': '', 'user_role': 'Admin', 'slmc_number': '', 'qualification': ''},
                users: [],

                // setup calander
                lang: {
                    days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                    months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    pickers: ['next 7 days', 'next 30 days', 'previous 7 days', 'previous 30 days'],
                    placeholder: {
                        date: 'Select Date',
                    }
                },
                isEmailExist: false,
            }
        },

        methods: {
            // Check whether entered email already exist or not
            ifExist() {
                axios.get('/admin/user_register/checkEmail', {params: {email: this.newUser.email}}).then((response) =>{
                    this.isEmailExist = response.data;
                });
            },

            // Register a new user
            registerUser() {
                this.$validator.validate();
                var input = this.newUser;
                axios.post('/admin/user_register/store', input).then((response) =>{
                }).catch(err => {
                    
                });
            }
        }
    }
</script>

<style>
    @media (min-width: 1200px) {
        .container{
            max-width: 750px;
        }
    }
    .mx-datepicker {
        width: 100%;
    }
    .mx-datepicker-popup {
        z-index: 2000; /*bring datepicker to the front*/
    }
    .mx-input {
        -webkit-box-shadow:none;
        box-shadow: none;
        height: 38px;
    }
</style>