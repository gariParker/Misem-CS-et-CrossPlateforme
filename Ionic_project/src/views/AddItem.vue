<template>
    <ion-page>
      <ion-header>
        <ion-toolbar>
          <ion-title>Ajouter un utilisateur</ion-title>
        </ion-toolbar>
      </ion-header>
      <ion-content>
        <ion-list>
          <ion-item>
            <ion-label position="floating">Name</ion-label>
            <ion-input v-model="form.name"></ion-input>
          </ion-item>
          <ion-item>
            <ion-label position="floating">Lastname</ion-label>
            <ion-input v-model="form.lastname"></ion-input>
          </ion-item>
          <ion-item>
            <ion-label position="floating">Email</ion-label>
            <ion-input v-model="form.email"></ion-input>
          </ion-item>
          <ion-item>
            <ion-label position="floating">Password</ion-label>
            <ion-input type="password" v-model="form.password"></ion-input>
          </ion-item>
        </ion-list>
        <ion-button expand="full" @click="addItem">Ajouter</ion-button>
        <ion-button expand="full" color="medium" @click="goBack">Annuler</ion-button>
      </ion-content>
    </ion-page>
  </template>
  
  <script>
  import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonList, IonItem, IonLabel, IonInput, IonButton } from '@ionic/vue';
  import { ref } from 'vue';
  import axios from 'axios';
  import { useRouter } from 'vue-router';
  
  export default {
    name: 'AddItem',
    setup() {
      const router = useRouter();
      const form = ref({
        name: '',
        lastname: '',
        email: '',
        password: ''
      });
  
      const addItem = async () => {
        try {
          await axios.post('http://localhost:8000/api/chemin/laravel_api/', form.value);
          router.push('/');
        } catch (error) {
          console.error('Error adding item:', error);
        }
      };
  
      const goBack = () => {
        router.push('/');
      };
  
      return {
        form,
        addItem,
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
  ion-list {
    margin: 20px;
  }
  
  ion-button {
    margin: 10px;
  }
  </style>
  