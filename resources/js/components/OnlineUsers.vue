<template>
    <div>
        <h1>Онлайн</h1>
        <ul>
            <li v-for="user in users" :key="user.id">
                <p class="online">{{ user.name }}</p>
            </li>
        </ul>
    </div>
</template>

<script>


export default {
    data() {
        return {
            users: []
        }
    },
    mounted() {
        this.getUsers()
        setInterval(() => {
            this.getUsers()
        }, 30000)
    },
    methods: {
        async getUsers() {
            try {
                const response = await axios.get('/lastAct')
                this.users = response.data
            } catch (error) {
                console.log(error)
            }
        }
    }
}
</script>

<style scoped>
.online{
    color:green;
    font-size: 20px;
}
ul{
    list-style-type: none;
}
</style>
