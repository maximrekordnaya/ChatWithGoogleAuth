<template>
    <div class="row">
        <div v-if="errors" class="col-12">
            <div v-for="(message, key) in errors.message" :key="key">
                {{message}}
            </div>
        </div>
        <div class="col-10">
            <input v-model="form.message" type="text" class="form-control mt-4">
        </div>
        <div class="col-2 d-flex align-items-end">
            <input @click.prevent="sendMessage" type="submit" class="btn btn-success form-control">
        </div>

    </div>
</template>

<script>
import {reactive} from "vue";
import useChat from "@/composable/chat";

export default {
    name: "ChatForm",
    setup() {
        const form = reactive({
            message: '',
        })

        const {errors, addMessage} = useChat()

        const sendMessage = async () => {
            await addMessage(form)

            form.message = ''
        }

        return {
            errors, form, sendMessage,
        }
    }
}
</script>

<style scoped>

</style>
