<script setup>
import { ref, onMounted } from "vue";
import api from "../api";
import { useRouter } from "vue-router";

const router = useRouter();
const users = ref([]);

const fetchUsers = async () => {
  try {
    const response = await api.get("/users", {
      headers: { Authorization: `Bearer ${localStorage.getItem("token")}` },
    });
    users.value = response.data;
  } catch (error) {
    alert("Error fetching users");
  }
};

const deleteUser = async (id) => {
  try {
    await api.delete(`/users/${id}`, {
      headers: { Authorization: `Bearer ${localStorage.getItem("token")}` },
    });
    fetchUsers();
  } catch (error) {
    alert("Error deleting user");
  }
};

const editUser = (id) => {
  router.push(`/edit/${id}`);
};

const logout = () => {
  localStorage.removeItem("token");
  router.push("/");
};

onMounted(fetchUsers);
</script>

<template>
  <div>
    <header class="header">
      <button class="nav-button" @click="router.push('/register')">Add User</button>
      <h1 class="title">User List</h1>
      <button class="nav-button" @click="logout">Logout</button>
    </header>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th class="actions-col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.first_name }} {{ user.last_name }}</td>
            <td>{{ user.email }}</td>
            <td>
              <button @click="editUser(user.id)">Edit</button>
              <button @click="deleteUser(user.id)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped>
.header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #007bff;
  padding: 1rem;
  color: #fff;
  position: relative;
}

/* Title centered using absolute positioning and transform */
.title {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  margin: 0;
  font-size: 1.5rem;
}

.nav-button {
  padding: 0.5rem 1rem;
  border: none;
  background: #0056b3;
  color: #fff;
  border-radius: 4px;
  cursor: pointer;
}

.nav-button:hover {
  background: #003f7f;
}

.table-container {
  margin: 2rem auto;
  width: 90%;
  max-width: 800px;
}

table {
  width: 100%;
  border-collapse: collapse;
  background: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th, td {
  padding: 1rem;
  border: 1px solid #ddd;
  text-align: left;
}

.actions-col {
  text-align: center;
}

button {
  padding: 0.5rem 0.75rem;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-right: 0.5rem;
}

button:first-of-type {
  background: #28a745;
  color: #fff;
}

button:first-of-type:hover {
  background: #218838;
}

button:last-of-type {
  background: #dc3545;
  color: #fff;
}

button:last-of-type:hover {
  background: #c82333;
}
</style>
