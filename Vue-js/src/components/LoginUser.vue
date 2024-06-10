<template>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card p-4" style="border-radius: 15px;">
            <h2 class="text-center mb-4">Login</h2>
            <form @submit.prevent="loginUser">
              <div class="mb-3">
                <label for="email_user" class="form-label">Email</label>
                <input type="email" class="form-control" id="email_user" v-model="form.email_user" required>
              </div>
              <div class="mb-3">
                <label for="password_user" class="form-label">Password</label>
                <input type="password" class="form-control" id="password_user" v-model="form.password_user" required>
              </div>
              <button type="submit" class="btn btn-primary btn-custom w-100">Login</button>
              <!-- Bouton pour faire l'inscription -->
              <button type="button" class="btn btn-link" @click="$router.push({ name: 'RegisterUser' })">Sign up</button>
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
          email_user: '',
          password_user: ''
        },
        errorMessage: ''
      };
    },
    methods: {
        async loginUser() {
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/chemin/laravel_api/login', this.form);
                alert('Login successful');
                // Stocker le token dans localStorage ou Vuex selon votre besoin
                localStorage.setItem('token', response.data.token);
                // Rediriger vers la page ItemList
                this.$router.push({ name: 'ItemList' });
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
      border: 2px solid rgb(33, 33, 116);
    }
    
    .btn-custom:hover {
      border-color: darkblue;
      background-color: lightblue;
    }
  </style>
  