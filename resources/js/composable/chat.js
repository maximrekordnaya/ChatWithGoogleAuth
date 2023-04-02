import {ref} from "vue";

export default function useChat(){
    const messages = ref([])
    const errors = ref([])

    const getMessages = async () =>{
        await axios.get('/chat/messages')
            .then(res=>{
                messages.value = res.data
            })
    }

    const addMessage = async (form)=>{
        errors.value = [];

        try {
            await axios.post('chat/send', form)
                .then(res => {
                    messages.value.push(res.data)
                })
        }catch (e){
            if(e.response.status === 422){
                errors.value = e.response.data.errors
            }
        }
    }

    return {
        messages, errors, addMessage, getMessages,
    }
}
