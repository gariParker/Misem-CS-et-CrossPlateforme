<template>
  <div>
    <h1>Ajouter un Utilisateur</h1>
    <form @submit.prevent="addItem" class="my-4">
      <div class="mb-3">
        <input v-model="newItem.name" placeholder="Name" required class="form-control" />
      </div>
      <div class="mb-3">
        <input v-model="newItem.lastname" placeholder="Lastname" required class="form-control" />
      </div>
      <div class="mb-3">
        <input v-model="newItem.email" placeholder="Email" required type="email" class="form-control" />
      </div>
      <div class="mb-3">
        <input v-model="newItem.password" placeholder="Password" type="password" required class="form-control" />
      </div>
      <!-- Message d'erreur -->
      <div v-if="errorMessage" class="alert alert-danger">{{ errorMessage }}</div>
      <!-- Message de succès -->
      <div v-if="successMessage" class="alert alert-success">{{ successMessage }}</div>
      <button type="submit" class="btn btn-primary">Add</button>
      <router-link to="/" class="btn btn-secondary ms-2">Back</router-link>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      newItem: { name: '', lastname: '', email: '', password: '' },
      errorMessage: '', // Ajouter une propriété pour les messages d'erreur
      successMessage: '' // Ajouter une propriété pour les messages de succès
    };
  },
  methods: {
    async addItem() {
      try {
        await this.$axios.post('/', this.newItem);
        this.successMessage = 'Added successfully';
        this.errorMessage = ''; // Réinitialiser le message d'erreur
        this.newItem = { name: '', lastname: '', email: '', password: '' }; // Réinitialiser le formulaire
        // Rediriger après un délai 2 sécondes pour permettre à l'utilisateur de voir le message de succès
        setTimeout(() => {
          this.$router.push('/');
        }, 2000);
      } catch (error) {
        this.successMessage = ''; // Réinitialiser le message de succès
        // Vérifiez si l'erreur a une réponse et des données
        if (error.response && error.response.data) {
          this.errorMessage = error.response.data.error;
        } else {
          this.errorMessage = 'An unexpected error occurred.';
        }
      }
    }
  }
};
</script>

<style>
body {
  color: rgb(181, 164, 164); 
}

.alert {
  margin-top: 10px;
}
</style>
