<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Home</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content>
      <ion-button @click="navigateToData">View Data</ion-button>
    </ion-content>
  </ion-page>
</template>

<script setup>
import { useRouter } from 'vue-router';
import { IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonButton } from '@ionic/vue';

const router = useRouter();

const navigateToData = () => {
  router.push({ name: 'Data' });
};
</script>

