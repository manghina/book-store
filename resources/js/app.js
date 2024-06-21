import { createApp } from 'vue';
import Dashboard from './components/Dashboard.vue';
import UserProfile from './components/UserProfile.vue';

const app = createApp({});

app.component('dashboard', Dashboard);
app.component('user-profile', UserProfile);

app.mount('#app');
