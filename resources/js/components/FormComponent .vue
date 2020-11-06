<template>
    <div class="container">
        <form action="" v-on:submit.prevent="newNotify()" >
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                        <label for="">Nombre</label>
                    <input type="text" class="form-control" name="name" v-model="name" required>
                     <label for="">Teléfono</label>
                    <input type="text" class="form-control" name="phone" v-model="phone" required>
                        </div>
                    </div>

                    <div class="col-md-6">

                <div class="form-group">

                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" v-model="email" required>
                    <label for="">Asunto</label>
                    <textarea name="subject" id="" cols="10" rows="5" class="form-control"  v-model="subject" required></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary">
                    Enviar
                </button>
                </div>
                </div>
    </div>
        </form>
        </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                phone: '',
                email: '',
                subject: '',
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
          newNotify(){
              const data = {
                name: this.name,
                phone: this.phone,
                email: this.email,
                subject: this.subject
              };
                this.name =  ''
                this.phone = ''
                this.email = '',
                this.subject = ''
                axios.post('api/notificacion', data)
                    .then((res) => {
                        const notify = res.data;
                        this.$emit('store', notify)
            }).catch((err) => console.log(err));
          }
        },
    }
</script>
