<template>
    <div class="container">
       <form-noti
        @store="addNotify"
        ></form-noti>

        <notification
        v-for="(notify, index) in notifications"
        :key="notify.id"
        :notify = "notify"
        @delete="deleteNotify(index)"
        ></notification>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                notifications:[]
            }
        },
        mounted() {
            axios.get('api/notificacion').then((res) => {
                this.notifications =res.data
            }).catch((err) => console.log(err));
        },
        methods: {
            addNotify(notify){
                this.notifications.push(notify.data);
            },
            deleteNotify(index) {
                this.notifications.splice(index, 1);
            }
        },

    }
</script>
