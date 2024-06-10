<template>
  <div>
    <h2>Listes des Utilisateurs</h2>
    <!-- Barre de recherche -->
    <div class="mb-3">
      <input v-model="searchQuery" class="form-control" placeholder="Rechercher par nom, prénom ou email" />
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Lastname</th>
          <th>Email</th>
          <!-- <th>Password</th> -->
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in filteredItems" :key="item.id">
          <td>{{ item.id }}</td>
          <td>{{ item.name }}</td>
          <td>{{ item.lastname }}</td>
          <td>{{ item.email }}</td>
          <!-- <td>{{ item.password }}</td> -->
          <td>
            <button @click="confirmDelete(item.id)" class="btn btn-danger">Delete</button>
            <router-link :to="{ name: 'UpdatePage', params: { id: item.id } }">
              <button class="btn btn-success">Edit</button>
            </router-link>
          </td>
        </tr>
      </tbody>
    </table>
    <router-link to="/add">
      <button class="btn btn-primary">Add Item</button>
    </router-link>

    <button @click="confirmDisconnect" class="btn btn-danger">Disconnect</button>

  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [],
      searchQuery: '' // propriété pour le champ de recherche
    };
  },
  created() {
    this.fetchItems();
  },
  computed: {
    filteredItems() {
      // Filtre les utilisateurs en fonction de la recherche
      return this.items.filter(item => {
        return (
          item.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||//IGNORE LE MAJUSCULE ET MINUSCULE  toLowerCase
          item.lastname.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          item.email.toLowerCase().includes(this.searchQuery.toLowerCase())
        );
      });
    }
  },
  methods: {
    async fetchItems() {
      try {
        const response = await this.$axios.get('/');
        this.items = response.data;
      } catch (error) {
        console.error('Error fetching items:', error);
      }
    },
    async deleteItem(itemId) {
      try {
        await this.$axios.delete(`/${itemId}`);
        this.fetchItems();
      } catch (error) {
        console.error('Error deleting item:', error);
      }
    },
    confirmDelete(itemId) {
      if (window.confirm('Êtes-vous sûr de vouloir supprimer ?')) {
        this.deleteItem(itemId);
      }
    },
    confirmDisconnect() {
      if (window.confirm('Êtes-vous sûr de vouloir déconnecter ?')) {
        this.$router.push({ name: 'LoginUser' });
      }
    }
  }
};
</script>

<style>
body {
    color: rgb(181, 164, 164);
  }

  .table {
    margin-top: 20px;
  }

  .btn {
    margin-right: 5px;
  }
</style>
