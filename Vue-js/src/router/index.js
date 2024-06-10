import { createRouter, createWebHistory } from 'vue-router'; // Importez les fonctions nécessaires de vue-router
import ItemList from '../components/ItemList.vue'; // Importez vos composants
import AddPage from '../components/AddPage.vue';
import UpdatePage from '../components/UpdatePage.vue';
import RegisterUser from '../components/RegisterUser.vue';
import LoginUser from '../components/LoginUser.vue';

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/logUser',
      name: 'LoginUser',
      component: LoginUser
    },
    {
      path: '/addUser',
      name: 'RegisterUser',
      component: RegisterUser
    },
    {
      path: '/add',
      name: 'AddPage',
      component: AddPage
    },
    {
      path: '/edit/:id',
      name: 'UpdatePage',
      component: UpdatePage,
      props: true
    },
    {
      path: '/',
      name: 'ItemList',
      component: ItemList
    },
  ]
});

export default router; // Exportez votre instance de router
