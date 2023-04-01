import './bootstrap';
import {createApp} from 'vue';

import Index from "@/components/Index.vue";
import ChatForm from "@/components/ChatForm.vue";
import ChatMessages from "@/components/ChatMessages.vue";
import OnlineUsers from "@/components/OnlineUsers.vue";

const app = createApp({
    components: {
        OnlineUsers,
        ChatForm,
        ChatMessages,
    },

});

app.mount('#app');

