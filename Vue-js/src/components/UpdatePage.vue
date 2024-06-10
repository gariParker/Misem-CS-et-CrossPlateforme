<template>
  <div>
    <h1>Modifier un Utilisateur</h1>
    <form @submit.prevent="updateItem" class="my-4">
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
      <button type="submit" class="btn btn-primary">Update</button>
      <router-link to="/" class="btn btn-secondary ms-2">Back</router-link>
    </form>
  </div>
</template>

<script>
export default {
  props: {
    id: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      newItem: { name: '', lastname: '', email: '', password: '' },
      errorMessage: '', // Ajout une propriété pour les messages d'erreur
      successMessage: '' // Ajou une propriété pour les messages de succès
    };
  },
  created() {
    this.fetchItem();
  },
  methods: {
    async fetchItem() {
      try {
        const response = await this.$axios.get(`/${this.id}`);
        this.newItem = response.data;
      } catch (error) {
        console.error('Error fetching item:', error);
      }
    },
    async updateItem() {
      try {
        await this.$axios.put(`/${this.id}`, this.newItem);
        this.successMessage = 'Updated successfully';
        this.errorMessage = ''; // Réinitialise le message d'erreur
        // Rediriger après 2 sécondes un délai pour permettre à l'utilisateur peut voir le message de succès
        setTimeout(() => {
          this.$router.push('/');
        }, 2000);
      } catch (error) {
        this.successMessage = ''; // Réinitialise le message de succès
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
