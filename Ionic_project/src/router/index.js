import { createRouter, createWebHistory } from '@ionic/vue-router';
import HomePage from '../views/HomePage.vue';
import AddItem from '../views/AddItem.vue';
import UpdatePage from '../views/UpdatePage.vue';
import DataTable from '../views/DataTable.vue'; // Import the new component

const routes = [
  {
    path: '/',
    redirect: '/home'
  },
  {
    path: '/home',
    name: 'HomePage',
    component: HomePage
  },
  {
    path: '/add',
    name: 'AddItem',
    component: AddItem
  },
  {
    path: '/update',
    name: 'UpdatePage',
    component: UpdatePage
  },
  {
    path: '/data', 
    name: 'Data',
    component: DataTable
  }
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
});

export default router;
