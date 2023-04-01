<template>
    <div class="row d-flex max-height" id="messages">
        <div v-for="message in messages">
            <div class="col-12 d-flex" :class="{'justify-content-end': message.user.id === user.id}">
                <div
                    class="card w-100 text-white d-inline-block ps-4 pe-4 w-25 p-1 mb-3"
                    :class="{'bg-primary':  message.user.id === user.id, 'bg-secondary':message.user.id !== user.id}">
                    <p class="m-0" v-if="message.user.id !== user.id">
                        <span>({{ message.user.name }}) - </span>
                        {{ message.message }}
                    </p>
                    <p class="m-0" v-else>
                        {{ message.message }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {onMounted} from "vue";
import useChat from "@/composable/chat";

export default {
    name: "ChatMessages",
    props: {
        user: {
            required: true,
            type: Object,
        }
    },
    setup() {
        const {messages, getMessages} = useChat()

        onMounted(() => {
            getMessages()

        })


        Echo.private(`chat`)
            .listen('MessageSend', (e) => {
                messages.value.push({
                    message: e.message.message,
                    user: e.user
                })

            });

        return {messages}
    },

}
</script>

<style scoped>

</style>
