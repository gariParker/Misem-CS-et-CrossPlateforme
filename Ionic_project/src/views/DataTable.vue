<template>
    <ion-page>
      <ion-header>
        <ion-toolbar>
          <ion-title>Listes des Utilisateurs</ion-title>
        </ion-toolbar>
      </ion-header>
      <ion-content>
        <!-- Barre de recherche -->
        <ion-searchbar v-model="searchQuery" placeholder="Rechercher par nom, prénom ou email"></ion-searchbar>
  
        <!-- Tableau des utilisateurs -->
        <ion-grid>
          <ion-row>
            <ion-col size="2"><strong>ID</strong></ion-col>
            <ion-col size="2"><strong>Name</strong></ion-col>
            <ion-col size="2"><strong>Lastname</strong></ion-col>
            <ion-col size="4"><strong>Email</strong></ion-col>
            <ion-col size="2"><strong>Actions</strong></ion-col>
          </ion-row>
          <ion-row v-for="item in filteredItems" :key="item.id">
            <ion-col size="2">{{ item.id }}</ion-col>
            <ion-col size="2">{{ item.name }}</ion-col>
            <ion-col size="2">{{ item.lastname }}</ion-col>
            <ion-col size="4">{{ item.email }}</ion-col>
            <ion-col size="2">
              <ion-button @click="confirmDelete(item.id)" color="danger">Delete</ion-button>
              <router-link :to="{ name: 'UpdatePage', params: { id: item.id } }">
                    <ion-button color="success">Edit</ion-button>
              </router-link>
            </ion-col>
          </ion-row>
        </ion-grid>
  
        <!-- Boutons -->
        <ion-button router-link="/add" color="primary">Add Item</ion-button>
        <ion-button @click="confirmDisconnect" color="danger">Disconnect</ion-button>
      </ion-content>
    </ion-page>
  </template>
  
  <script>
  import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonGrid, IonRow, IonCol, IonButton, IonSearchbar } from '@ionic/vue';
  import { ref, computed, onMounted } from 'vue';
  import axios from 'axios';
  
  export default {
    name: 'DataTable',
    setup() {
      const items = ref([]);
      const searchQuery = ref('');
  
      const fetchItems = async () => {
        try {
          const response = await axios.get('http://localhost:8000/api/chemin/laravel_api/');
          items.value = response.data;
        } catch (error) {
          console.error('Error fetching items:', error);
        }
      };
  
      const deleteItem = async (itemId) => {
        try {
          await axios.delete(`http://localhost:8000/api/chemin/laravel_api/${itemId}`);
          fetchItems(); // Refresh the data after deletion
        } catch (error) {
          console.error('Error deleting item:', error);
        }
      };
  
      const confirmDelete = (itemId) => {
        if (window.confirm('Êtes-vous sûr de vouloir supprimer ?')) {
          deleteItem(itemId);
        }
      };
  
      const confirmDisconnect = () => {
        if (window.confirm('Êtes-vous sûr de vouloir déconnecter ?')) {
          router.push({ name: 'HomePage' });
        }
      };
  
      onMounted(fetchItems);
  
      const filteredItems = computed(() =>
        items.value.filter(item =>
          item.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
          item.lastname.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
          item.email.toLowerCase().includes(searchQuery.value.toLowerCase())
        )
      );
  
      return {
        items,
        searchQuery,
        fetchItems,
        deleteItem,
        confirmDelete,
        confirmDisconnect,
        filteredItems
      };
    },
    components: {
      IonPage,
      IonHeader,
      IonToolbar,
      IonTitle,
      IonContent,
      IonGrid,
      IonRow,
      IonCol,
      IonButton,
      IonSearchbar
    }
  };
  </script>
  
  <style scoped>
  ion-grid {
    margin-top: 20px;
  }
  
  ion-col {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
  }
  
  ion-button {
    margin-right: 5px;
  }
  
  ion-searchbar {
    margin: 10px;
  }
  </style>
  