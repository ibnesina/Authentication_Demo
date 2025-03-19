import { createRouter, createWebHistory } from "vue-router";
import Register from "../views/Register.vue";
import Login from "../views/Login.vue";
import UserList from "../views/UserList.vue";
import EditUser from "../views/EditUser.vue";

const routes = [
  { path: "/", component: Login },
  { path: "/register", component: Register },
  { path: "/users", component: UserList },
  { path: "/edit/:id", component: EditUser },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
