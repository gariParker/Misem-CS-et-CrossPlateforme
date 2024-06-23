<template>
    <ion-page>
      <ion-header>
        <ion-toolbar>
          <ion-title>Modifier un Utilisateur</ion-title>
        </ion-toolbar>
      </ion-header>
      <ion-content>
        <ion-list>
          <ion-item>
            <ion-label position="floating">Name</ion-label>
            <ion-input v-model="newItem.name" placeholder="Name" required></ion-input>
          </ion-item>
          <ion-item>
            <ion-label position="floating">Lastname</ion-label>
            <ion-input v-model="newItem.lastname" placeholder="Lastname" required></ion-input>
          </ion-item>
          <ion-item>
            <ion-label position="floating">Email</ion-label>
            <ion-input v-model="newItem.email" placeholder="Email" required type="email"></ion-input>
          </ion-item>
          <ion-item>
            <ion-label position="floating">Password</ion-label>
            <ion-input v-model="newItem.password" placeholder="Password" required type="password"></ion-input>
          </ion-item>
        </ion-list>
        <!-- Message d'erreur -->
        <div v-if="errorMessage" class="alert alert-danger">{{ errorMessage }}</div>
        <!-- Message de succès -->
        <div v-if="successMessage" class="alert alert-success">{{ successMessage }}</div>
        <ion-button expand="full" @click="updateItem">Update</ion-button>
        <ion-button expand="full" color="medium" @click="goBack">Back</ion-button>
      </ion-content>
    </ion-page>
  </template>
  
  <script>
  import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonList, IonItem, IonLabel, IonInput, IonButton } from '@ionic/vue';
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import { useRouter, useRoute } from 'vue-router';
  
  export default {
    name: 'UpdatePage',
    setup() {
      const router = useRouter();
      const route = useRoute();
      const newItem = ref({ name: '', lastname: '', email: '', password: '' });
      const errorMessage = ref('');
      const successMessage = ref('');
  
      const fetchItem = async () => {
        try {
          const response = await axios.get(`http://localhost:8000/api/chemin/laravel_api/${route.params.id}`);
          newItem.value = response.data;
        } catch (error) {
          console.error('Error fetching item:', error);
          errorMessage.value = 'Error fetching item';
        }
      };
  
      const updateItem = async () => {
        try {
          await axios.put(`http://localhost:8000/api/chemin/laravel_api/${route.params.id}`, newItem.value);
          successMessage.value = 'Updated successfully';
          errorMessage.value = 'gfdsgsdfgsdfgs';
          // Rediriger après 2 secondes
          setTimeout(() => {
            router.push('/');
          }, 2000);
        } catch (error) {
          successMessage.value = '';
          if (error.response && error.response.data) {
            errorMessage.value = error.response.data.error;
          } else {
            errorMessage.value = 'An unexpected error occurred.';
          }
        }
      };
  
      const goBack = () => {
        router.push('/');
      };
  
      onMounted(() => {
        fetchItem();
      });
  
      return {
        newItem,
        errorMessage,
        successMessage,
        updateItem,
        goBack
      };
    },
    components: {
      IonPage,
      IonHeader,
      IonToolbar,
      IonTitle,
      IonContent,
      IonList,
      IonItem,
      IonLabel,
      IonInput,
      IonButton
    }
  };
  </script>
  
  <style scoped>
  .alert {
    margin: 10px;
  }
  
  ion-list {
    margin: 20px;
  }
  
  ion-button {
    margin: 10px;
  }
  </style>
  