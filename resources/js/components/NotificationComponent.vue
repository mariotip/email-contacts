<template>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="container">

                    <div class="row">
                    <div class="col">
                    <label for="">Nombre:</label><span> {{notify.name}}</span>
                    </div>
                    <div class="col">
                    <label for="">Teléfono:</label><span> {{notify.phone}}</span>
                    </div>
                    <div class="col">
                    <label for="">Email:</label><span> {{notify.email}}</span>
                    </div>
                    <div class="col">
                    <label for="">Asunto:</label><span> {{notify.subject}}</span>
                    </div>
                    <button class="btn btn-outline-danger btn-sm" v-on:click="clicDelete()">
                        Eliminar
                    </button>
                    </div>
                 </div>

            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props:['notify'],

        data() {
            return {
                flag : false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            clicDelete() {
                axios.delete(`api/notificacion/${this.notify.id}`).then(() => {
                    this.$emit('delete');
                }).catch((err) => console.log(err));
            },
        }
    }
</script>
