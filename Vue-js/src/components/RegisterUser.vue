<template>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card p-4" style="border-radius: 15px;">
            <h2 class="text-center mb-4">Register</h2>
            <form @submit.prevent="registerUser">
              <div class="mb-3">
                <label for="name_user" class="form-label">Name</label>
                <input type="text" class="form-control" id="name_user" v-model="form.name_user" required>
              </div>
              <div class="mb-3">
                <label for="email_user" class="form-label">Email</label>
                <input type="email" class="form-control" id="email_user" v-model="form.email_user" required>
              </div>
              <div class="mb-3">
                <label for="password_user" class="form-label">Password</label>
                <input type="password" class="form-control" id="password_user" v-model="form.password_user" required>
              </div>
              <div class="mb-3">
                <label for="password_confirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirm" v-model="form.password_confirm" required>
              </div>
              <button type="submit" class="btn btn-primary btn-custom w-100">Register</button>
              <button type="button" class="btn btn-link" @click="$router.push({ name: 'LoginUser' })">Log in</button>
            </form>
            <div v-if="errorMessage" class="alert alert-danger mt-3">
              {{ errorMessage }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        form: {
          name_user: '',
          email_user: '',
          password_user: '',
          password_confirm: ''
        },
        errorMessage: ''
      };
    },
    methods: {
      async registerUser() {
        try {
          const response = await axios.post('http://127.0.0.1:8000/api/chemin/laravel_api/register', this.form);
          alert('User registered successfully');
        } catch (error) {
          this.errorMessage = error.response.data.error || 'An error occurred';
        }
      }
    }
  };
  </script>
  
  <style>
  .btn-custom {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
    border: 2px solid blue;
  }
  
  .btn-custom:hover {
    border-color: darkblue;
    background-color: rgb(45, 194, 244);
  }
  </style>
  